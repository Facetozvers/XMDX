<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="container" style="padding-left:250px; padding-right:250px">
        <div class="row d-flex justify-content-center text-center align-items-center" style="height:800px">
            <h1>MENGALIHKAN KE HALAMAN AUTENTIKASI...</h1><br>
            <div class="d-flex align-items-start justify-content-center">
                <div class="spinner-grow me-2" role="status" aria-hidden="true"></div>
                <div class="spinner-grow me-2" role="status" aria-hidden="true"></div>
                <div class="spinner-grow me-2" role="status" aria-hidden="true"></div>
                <div class="spinner-grow me-2" role="status" aria-hidden="true"></div>
                <div class="spinner-grow" role="status" aria-hidden="true"></div>
            </div>
        </div>
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script id="midtrans-script" type="text/javascript"
    src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js"
    data-environment="sandbox"
    data-client-key="SB-Mid-client-SOT7b8W7C_UZqv4U"></script>

    <script>
        var redirect_url = "{{$chargeData->redirect_url}}";
        console.log(redirect_url);
        // callback functions
        var options = {
            performAuthentication: function(redirect_url){
                // Implement how you will open iframe to display 3ds authentication redirect_url to customer
                MidtransNew3ds.redirect( redirect_url, { callbackUrl : 'http://localhost:8000' });
            },
            onSuccess: function(response){
                // 3ds authentication success, implement payment success scenario
                console.log('response:',response);
                popupModal.closePopup();
            },
            onFailure: function(response){
                // 3ds authentication failure, implement payment failure scenario
                console.log('response:',response);
                popupModal.closePopup();
            },
            onPending: function(response){
                // transaction is pending, transaction result will be notified later via 
                // HTTP POST notification, implement as you wish here
                console.log('response:',response);
                popupModal.closePopup();
            }
        };
        
        // trigger `authenticate` function
        MidtransNew3ds.authenticate(redirect_url, options);
  
    </script>
</body>
</html>