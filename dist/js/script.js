function rateUnit(rateUnit){
    var regex=/^[0-9]+$/;
    if(!rateUnit.value.match(regex)){
        rateUnit.value = rateUnit.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(rateUnit).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}

function quantity(quantity){
    var regex=/^[0-9]+$/;
    if(!quantity.value.match(regex)){
        quantity.value = quantity.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(quantity).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}

$(document).ready(function(){
    //group add limit
    var maxGroup = 20;
    
    //add more fields group
    $(".addMore").click(function(){
      //alert($('form').find('.ui.form').length);
        if($('form').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="three fields fieldGroup"><div class="ten wide field"><label>Descrition</label><textarea class="form-control" name="descItem[]" rows="1"></textarea></div><div class="two wide field"><label>Rate</label><input type="text" class="form-control rate_unit" name="rateUnit[]" onkeyup="rateUnit(this)" value="0" placeholder="0"></div><div class="two wide field"><label>Quantity</label><input type="text" class="form-control quantity" name="quantity[]" onkeyup="quantity(this)" class="quantity" value="0" placeholder="0"></div><div class="two wide field"><label>Sum</label><div class="ui action input"><input type="text" class="form-control sumUnit" value="0" placeholder="0" readonly><button class="ui remove button" href="javascript:void(0)"><i class="minus icon"></i></button></div></div></div>';
            $('form').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $('form').on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});