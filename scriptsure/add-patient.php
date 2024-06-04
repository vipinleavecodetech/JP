<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScriptSure Create Patient</title>
</head>
<body>
    <button onclick="createPatient()">Create Patient</button>
    <hr />
    <div><span style="font-weight: bold;">Session Token:</span>
    <span id="sessiontoken"> ??? </span></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

    <script>
        const SERVER_URL = 'https://spa.scriptsure.com/v3/login/byapp';
        const API_KEY = '22951580-c891-47f1-b20b-28ae55983999';
        const SECRET = '$2b$10$ftiH.VaJVJDNLqhVScTYoORAcDTgpS1Xzeud9AsT/5MP/fV/3gJrK';
        const EMAIL = 'sales@leavecode.com';

        // Generate the SHA1 Hash
        const generateHash = (apikey, password, dtStamp) => {
            const message = `${apikey}_${password}_${dtStamp}`;
            const hash = CryptoJS.HmacSHA1(message, password).toString(CryptoJS.enc.Hex);
            return hash;
        };

        //GENERATE API KEY VALUE to send as part of request body
        const encodeAPIKey = (apiKey, secret) => {
            // build message from apiKey, secret, and time in milliseconds
            const mills = Date.now();
            const finalHash = generateHash(apiKey, secret, mills);
            const encodedValue = apiKey + "~" + finalHash + "~" + mills;
            return encodedValue;
        }

        async function scriptSureAuthentication(apiKey, token, email) {
            const login = {
                method: 'post',
                url: SERVER_URL,
                headers: { apiKey: apiKey, 'Content-Type': 'application/json', Accept: 'application/json' },
                data: { apikey: token, email: email }
            };
            try {
                let res = await axios.request(login);
                console.log(res.data);
                let sessionToken = res.data.sessionToken;
                let practiceId = res.data.practices[0].id;
                console.log('Session Token:', sessionToken); // Log the session token
                console.log('practiceId:', practiceId); // Log the session token
                scriptSurePatientCreate(sessionToken,practiceId); // Call scriptSurePatientCreate with the session token
                document.getElementById('sessiontoken').innerHTML = sessionToken;
            } catch (error) {
                console.error('Error:', error.response ? error.response.data : error.message);
            }
        }

        //Create Patient Start
        async function scriptSurePatientCreate(token,practiceId) {
            const createPatient = {
                method: 'post',
                url: 'https://ssa.scriptsure.com/v3/patient?sessiontoken=' + token,
                headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                data: {
                    dob: '1988-08-25',
                    zip: '83201',
                    cell: '3078558657',
                    city: 'Pocatello',
                    home: '3078574587',
                    work: '5188995560',
                    state: 'ID',
                    gender: 'M',
                    consent: true,
                    doctorId: 1,
                    lastName: 'Jonathan',
                    firstName: 'Hook',
                    practiceId: practiceId,
                    addressLine1: '315 Filmore Dj',
                    patientStatusId: 0,
                    preferredCommunicationId: '0'
                }
            };
            try {
                let res = await axios.request(createPatient);
                //console.log('Patient Creation Response:', res.data);
                //console.log(res.data.savedPatientObj.patientId);
                //console.log(res.data.savedPatientObj.userIdAdded);
                window.location = 'https://ssu.scriptsure.com/chart/' + res.data.savedPatientObj.patientId + '?sessiontoken=' + token + '&darkmode=on';

            } catch (error) {
                console.error('Error:', error.response ? error.response.data : error.message);
            }
        }
        //Create Patient End
      const createPatient = () => {
        const encodedApiKey = encodeAPIKey(API_KEY, SECRET);
        console.log("Encoded API Key:", encodedApiKey);
        scriptSureAuthentication(API_KEY, encodedApiKey, EMAIL);
      }
    </script>
</body>
</html>
