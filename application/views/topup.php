<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/topup_styles.css')?>">
    <script src="https://unpkg.com/paymaya-js-sdk@2.0.0/dist/bundle.js"></script>
    <title>BeFit Topup</title>
</head>
<body>

    <script>
      function checkout() {
        var postValue = parseInt(document.getElementById("topup").value);
        document.cookie = `value=${postValue}`;
        const myExampleObject = {
        "totalAmount": {
        "currency": "PHP",
        "value": postValue
        },
        "redirectUrl": {
            "success": "<?php echo base_url('user/success')?>?=<?php echo $this->session->userdata('userid'); ?>",
            "failure": "https://www.merchantsite.com/failure",
            "cancel": "https://www.merchantsite.com/cancel"
        },
        "requestReferenceNumber": "1551191039",
        "metadata": {}
        };
        PayMayaSDK.init('pk-Z0OSzLvIcOI2UIvDhdTGVVfRSSeiGStnceqwUE7n0Ah', true);
        PayMayaSDK.createCheckout(myExampleObject);
      }
      
      
    </script>
  <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          var postValue = parseInt(document.getElementById("topup").value);
          document.cookie = `value=${postValue}`;
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"PHP","value":postValue}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            actions.redirect('<?php echo base_url('user/success')?>?=<?php echo $this->session->userdata('userid'); ?>');

          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

    <form onsubmit="return false;" method="post">
        <div>
					<label for="topup">Topup</label><br>
					<input type="text" id="topup" name="topup">
				</div>
        <div class="registerbtn">
					<input type="submit" value="Topup" onclick="checkout()">
				</div>
    </form>


</body>
</html>