$.fn.multiSelect = function(options){
    // Default options
    var settings = $.extend({
        label: 'Select'
    }, options );

    var wrap = this,
        selectEl = wrap.children("select"),
        inputEl = wrap.children("input");        

    var mainEl = $("<div></div>").addClass("multiselect-wrap").css("width","100%"),
        selectedEl = $("<div></div>").addClass("multiselect-selected").text(settings.label),
        listEl = $("<div></div>").addClass("multiselect-list").css("display","none");

    selectEl.find("option").each(function(){
        var option = $(this);
        var optionEl = $("<div></div>").text(option.text()).attr('data-val', option.val());
        optionEl.appendTo(listEl);

        optionEl.on('click',function(){
            $(this).toggleClass("selected-option");

            selectedEl.empty();
            selectedVal = [];
            listEl.find(".selected-option").each(function(){
                var $this = $(this),
                    span = $("<span></span>").text($this.text());
                span.appendTo(selectedEl);

                selectedVal.push($this.attr('data-val'));
            });

            if (inputEl.length > 0 ) {
                $("#locationbox").html('');
                inputEl.val(selectedVal.join(",")); 

                if(inputEl.attr('id') == 'locations' && $("#locations").val() != '')  
                {
                    var str = $('#locations').val();                    
                    var a1 = new Array();
                    a1=str.split(",");
                    if(a1.length > 0)
                    {
                        for (i=0;i<a1.length;i++)
                        {
                            $("#locationbox").append(locationbox2(a1[i]));
                        }
                    }
                    else
                    {
                        $("#locationbox").html('');
                    }
                    
                }  
                           
            }
        });
    });

    selectedEl.on("click",function(){
        if (listEl.hasClass("multi-list-opened")) {
            listEl.slideUp(function(){
                listEl.removeClass('multi-list-opened')
            });
        } else {
            listEl.slideDown(function(){
                listEl.addClass('multi-list-opened')
            });
        }
    });
    mainEl.append(selectedEl).append(listEl);
    wrap.append(mainEl);
    selectEl.hide();

    $('html').click(function(e) {                    
        if(!$(e.target).is(wrap) && !$(e.target).is(listEl) && !$(e.target).is(selectedEl) && !$(e.target).is(mainEl) && !$(e.target).is(listEl.children()) && !$(e.target).is(selectedEl.children()) )
        {          
            if ( listEl.hasClass("multi-list-opened")){
                console.log("html event");
                listEl.slideUp(function(){
                    listEl.removeClass('multi-list-opened');
                });
            }
        }
    }); 
    return this;
};

function locationbox2(textboxname)
{
    return '<div class="input-group" style="margin-bottom: 10px;"><input type="text" class="form-control" placeholder="Address of '+textboxname+'" name="'+textboxname+'"></div>';
}