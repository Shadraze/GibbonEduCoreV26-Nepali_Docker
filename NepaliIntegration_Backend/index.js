import expressApp from 'express';
import http from 'http';
import {NepaliFunctions} from './lib/nepali.datepicker.v4.0.1.min.js';

const app =  expressApp();
app.use(expressApp.json());

app.post('/ad2bs', (req, res) => {
  var requestJson = req.body;
  // console.log(JSON.stringify(requestJson));
  try
  {
    var bsDateJson = NepaliFunctions.AD2BS({
      year:requestJson.year
      ,month:requestJson.month
      ,day:requestJson.day
    });

    res.status(200).send(bsDateJson);
  }
  catch(e)
  {
    console.error(e);
    res.status(400).send("Request Invalid. May need proper formatting or querying within accepted range.");  
  }
})

const httpServer = http.createServer(app);
httpServer.listen(8848,"0.0.0.0");
console.log("Listening on 8848");
