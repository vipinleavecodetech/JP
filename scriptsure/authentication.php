<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Form</title>
</head>
<body>
<button onclick="generateToken()">Generate Token</button>
<hr />
<div><span style="font-weight: bold;">Session Token:</span>
    <span id="sessiontoken"> ??? </span></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
<script>
    const SERVER_URL = 'https://spa.scriptsure.com/v3/login/byapp';
    const API_KEY = '22951580-c891-47f1-b20b-28ae55983999';
    const SECRET = '$2b$10$ftiH.VaJVJDNLqhVScTYoORAcDTgpS1Xzeud9AsT/5MP/fV/3gJrK';
    const EMAIL = 'vipin@leavecodetech.com';
    
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
      const config = {
        method: 'post',
        url: SERVER_URL,
        headers: { apiKey: apiKey, 'Content-Type': 'application/json', Accept: 'application/json' },
        data: { apikey: token, email: email }
      };
      try {
        let res = await axios.request(config);
        let token = res.data.sessionToken;
        document.getElementById('sessiontoken').innerHTML = token;
      } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
      }
    }
    
    const generateToken = () => {
        const encodedApiKey = encodeAPIKey(API_KEY, SECRET);
        console.log("Encoded API Key:", encodedApiKey);
        scriptSureAuthentication(API_KEY, encodedApiKey, EMAIL);
    }
    
  </script>
</body>
</html>