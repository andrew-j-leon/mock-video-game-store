
        function validateForm()
        {
            if (!validEmail())
            {
                alert("Invalid Email.");
                return false;
            }
            
            else if (!validCardNumber())
            {
                alert("Card number must be comprised of 16 digits.");
                return false;
            }
            
            else if (!validSecurityCode())
            {
                alert("Security code must be comprised of 3 digits.");
                return false;
            }
            
            else if (!validAddressNumber())
            {
                alert("Address number must be comprised of 5 digits.");
                return false;
            }
        
            else if (!validStreetName())
            {
                alert("Address street name must be comprised of words.");
                return false;
            }
            
            else if (!validCity())
            {
                alert("City name must be comprised of words.");
                return false;
            }
            
            else if (!validState())
            {
                alert("State name must be comprised of words.");
                return false;
            }
            
            else if (!validZip())
            {
                alert("Zip must be comprised of 5 digits.");
                return false;
            }
            
            else if (!validPhoneNumber())
            {
                alert("Invalid phone number.");
                return false;
            }
            
            return true;
        }
        
        function validEmail()
        {
            var input = document.forms["purchaseForm"]["email"].value;
            var patt = /^.+@.+\.(com|edu)$/;
            
            return patt.test(input);
        }
        
        function validCardNumber()
        {
            var input = document.forms["purchaseForm"]["cardNumber"].value;
            var patt = /[0-9]{16}/;
            
            return patt.test(input);
        }
        
        function validSecurityCode()
        {
            var input = document.forms["purchaseForm"]["securityCode"].value;
            var patt = /[0-9]{3}/;
            
            return patt.test(input);
        }
        
        function validAddressNumber()
        {
            var input = document.forms["purchaseForm"]["addressNumber"].value;
            var patt = /[0-9]{5}/;
            
            return patt.test(input);
        }
        
        function validStreetName()
        {
            var input = document.forms["purchaseForm"]["streetName"].value;
            var patt = /^[a-zA-Z\s]+$/;
            
            return patt.test(input);
        }
        
        function validCity()
        {
            var input = document.forms["purchaseForm"]["city"].value;
            var patt = /^[a-zA-Z\s]+$/;
            
            return patt.test(input);
        }
        
        function validState()
        {
            var input = document.forms["purchaseForm"]["state"].value;
            var patt = /^[a-zA-Z\s]+$/;
            
            return patt.test(input);
        }
        
        function validZip()
        {
            var input = document.forms["purchaseForm"]["zip"].value;
            var patt = /[0-9]{5}/;

            return patt.test(input);
        }
        
        function validPhoneNumber()
        {
            var input = document.forms["purchaseForm"]["phoneNumber"].value;
            var patt1 = /^\([0-9]{3}\)(-| )?[0-9]{3}(-| )?[0-9]{4}$/;
            var patt2 = /^[0-9]{3}(-| )?[0-9]{3}(-| )?[0-9]{4}$/;
            
            return patt1.test(input) || patt2.test(input);
        }

