/**
 * Created by alber on 2014/7/2.
 */
// src\Abdwg\JobeetBundle\Resources\public\js\search.js
$(document).ready(function()
{
    $('.search input[type="submit"]').hide();

    $('#search_keywords').keyup(function(key)
    {
        if(this.value.length >= 3 || this.value == '') {
            $('#loader').show();
            $('#jobs').load(
                $(this).parent('form').attr('action'),
                { query: this.value ? this.value + '*' : this.value },
                function() {
                    $('#loader').hide();
                }
            );
        }
    });
});

