(function($) {


    var $contactForm = $('#contactForm');
    var $contactFormButton = $('#contact-form-button');

    $contactFormButton.on('click', contactFormPressed);

    function contactFormPressed(event) {
        event.preventDefault();
        var data = clearData($contactForm.serializeArray());
        if(data.message != ''){
            console.log('stop spam');
            return;
        }
        sendContactForm(JSON.stringify(data));
        $contactFormButton.attr('disabled','disabled');
    }

    function clearData(data) {
        var newData = {};
        for(var i = 0; i < data.length; i++){
            newData[data[i].name] = data[i].value;
        }
        return newData;
    }

    function sendContactForm(data){
        $.ajax({
            type: "POST",
            url: contact_form.url,
            data: {
                action: 'contact_form',
                data: data
            },
            success: function (data) {
                console.log(data);
                $contactFormButton.removeAttr('disabled');
            },
            error: function (x,y,z) {
                console.log(x);
                $contactFormButton.removeAttr('disabled');
            },
            dataType: 'json'
        });
    }
})(jQuery);