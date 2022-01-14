<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pilih Pembayaran</title>
  </head>
  <body>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center py-3" style="background-color:#3bbea5"><strong>Checkout</strong></h2>
        </div>
    </div>
    <div class="container border mb-5">
        <div class="row">
            <h5 class="alert alert-info">Total : Rp. 699,000</h5>
        </div>
        <div class="row mb-4" style="padding-left:90px; padding-right:90px">
            <div id="card_validation_status" class="alert d-none"></div>
            <label for="">Card Payment</label>
            <div class="row">
              <input type="number" id="card_number" name="card_number" placeholder="Card Number" class="form-control">
              <input type="number" id="card_exp_month" name="card_exp_month" placeholder="Card Exp. Month" class="form-control">
              <input type="number" id="card_exp_year" name="card_exp_year" placeholder="Card Exp. Year"class="form-control">
              <input type="number" id="card_cvv" name="card_cvv" placeholder="Card CVV" class="form-control">
            </div>
            <button class="btn btn-primary mx-auto my-1 py-3" onclick="getToken()">Submit</button>
            <form action="/midtrans/chargeCard" method="post" id="tokenForm">
              @csrf
              <input type="hidden" name="card_token" id="card_token">
            </form>

            <label for="" class="mt-3">Transfer Virtual Account</label>
            <a href="/midtrans/chargeBNIVA" class="btn btn-dark mx-auto my-1 py-3">BNI Virtual Account</a>
            <a href="/midtrans/chargeBCAVA" class="btn btn-dark mx-auto my-1 py-3">BCA Virtual Account</a>
            <a href="/midtrans/chargeBRIVA" class="btn btn-dark mx-auto my-1 py-3">BRI Virtual Account</a>
            <a href="/midtrans/chargeMandiriVA" class="btn btn-dark mx-auto my-1 py-3">Mandiri Virtual Account</a>
            <a href="/midtrans/chargePermataVA" class="btn btn-dark mx-auto my-1 py-3">Permata Virtual Account</a>

            <label for="" class="mt-3">eWallet</label>
            <a href="/xendit/chargeDana" class="btn btn-success mx-auto my-1 py-3">DANA</a>
            <a class="btn btn-success mx-auto my-1 py-3">OVO</a>
            <form action="/xendit/chargeOVO" method="post" id="tokenForm">
              @csrf
              <input type="number" name="mobile_number" placeholder="Nomor Handphone" required>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="/xendit/chargeShopeePay" class="btn btn-success mx-auto my-1 py-3">SHOPEEPAY</a>
            <a href="/midtrans/chargeGopay" class="btn btn-success mx-auto my-1 py-3">GOPAY</a>
            <a href="/xendit/chargeLinkAja" class="btn btn-success mx-auto my-1 py-3">LINKAJA</a>
            <a href="" class="btn btn-success mx-auto my-1 py-3">QRIS</a>

            <label for="" class="mt-3">Retail</label>
            <a href="/xendit/chargeAlfamart" class="btn btn-success mx-auto my-1 py-3">Alfamart</a>
            <a href="/xendit/chargeIndomaret" class="btn btn-success mx-auto my-1 py-3">Indomaret</a>
            

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script id="midtrans-script" type="text/javascript"
    src="https://api.midtrans.com/v2/assets/js/midtrans-new-3ds.min.js"
    data-environment="sandbox"
    data-client-key="SB-Mid-client-SOT7b8W7C_UZqv4U"></script>

    <script>
      function getToken(){
        var cardData = {
          "card_number": document.getElementById('card_number').value,
          "card_exp_month": document.getElementById('card_exp_month').value,
          "card_exp_year": document.getElementById('card_exp_year').value,
          "card_cvv": document.getElementById('card_cvv').value,
        }
        
        var alertBox = document.getElementById('card_validation_status');
        var options = {
          onSuccess: function(response){
            alertBox.classList.remove("d-none");
            alertBox.classList.add("alert-success");
            alertBox.innerHTML = 'Validasi Sukses, Mengalihkan ke halaman pembayaran...';
            
            var token_id = response.token_id;
            document.getElementById('card_token').value = token_id;
            setTimeout(document.getElementById('tokenForm').submit(), 2500);
            
          },
          onFailure: function(response){
            alertBox.classList.remove("d-none");
            alertBox.classList.add("alert-danger");
            alertBox.innerHTML = 'Validasi Gagal, Coba Lagi';

          }
        };
        
        MidtransNew3ds.getCardToken(cardData, options);
      }
    </script>
  </body>
</html>