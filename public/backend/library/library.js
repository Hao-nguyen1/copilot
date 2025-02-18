(function($){
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');
    HT.switchery = () => {
        $('.js-switch').each(function() {
            // let _this = $(this)
            var switchery = new Switchery(this, {color: '#1AB394', size: 'small'});

        });
    }

    HT.select2 = () => {
        if($('.setupSelect2').length){
            $('.setupSelect2').select2();

        }
    }

    HT.changeStatus = () => {
        $(document).on('change', '.status', function(e){
            let _this = $(this)
            let option = {
                'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field' : _this.attr('data-field'),
                '_token' : _token
            }
            $.ajax({
                url : 'ajax/dashboard/changeStatus',
                type : 'POST',
                data : option,
                success : function(res){
                    console.log(res);
                },
                error : function(jqXHR, textStatus, errorThrown){
                    console.log('Lỗi: ' +textStatus + ' ' + errorThrown);
                }

            });

            e.preventDefault();
        })
    }

    HT.changeStatusAll = () => {
        if($('.changeStatusAll').length){
            $(document).on('click', '.changeStatusAll', function(e){
                let _this = $(this)
                let id = []
                $('.checkBoxItem').each(function(){
                    let checkBox = $(this)
                    if(checkBox.prop('checked')){
                        id.push(checkBox.val());
                    }
                })   
                let option = {
                    'value' : _this.attr('data-value'),
                    'model' : _this.attr('data-model'),
                    'field' : _this.attr('data-field'),
                    'id'    : id,
                    '_token' : _token
                }
                $.ajax({
                    url : 'ajax/dashboard/changeStatusAll',
                    type : 'POST',
                    data : option,
                    dataType : 'json',
                    success : function(res){
                        if(res.flag == true){
                            let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;'
                            let cssActive2 = 'left: 13px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s, ease 0s;' 
                            let cssUnActive1 = 'background-color : rgb(2552 255, 255); border-color: rgb(223, 223, 223); box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;'
                            let cssUnActive2 = 'left: 0px; background-color: 0.4s ease 0s; left 0.2s ease 0s;'
                            for(let i = 0; i < id.length; i++){

                                if(option.value == 1){
                                    $('.js-switch-'+id[i]).find('span.switchery')
                                    .attr('style', cssActive1).find('small').attr('style', cssActive2);
                                }else if(option.value == 0){
                                    $('.js-switch-'+id[i]).find('span.switchery')
                                    .attr('style', cssUnActive1).find('small').attr('style', cssUnActive2);
                            }
                        }
                    }
                    },
                    error : function(jqXHR, textStatus, errorThrown){
                        console.log('Lỗi: ' +textStatus + ' ' + errorThrown);
                    }
                });
                e.preventDefault();
            })
        }
    }

    HT.checkAll = () => {
        if($('#checkAll').length){
            $(document).on('click', '#checkAll', function(){
                let isChecked = $(this).prop('checked');

                $('.checkBoxItem').prop('checked', isChecked);
                $('.checkBoxItem').each(function(){
                    let _this = $(this)
                    HT.changeBackground(_this);
                    HT.allChecked();
                })                
            })
        }
    }

    HT.checkBoxItem = () => {
        if($('.checkBoxItem').length){
            $(document).on('click', '.checkBoxItem', function(){
                let _this = $(this)
                HT.changeBackground(_this);
            })
        }
    }

    HT.changeBackground = (object) => {
        let isChecked = object.prop('checked');

        if(isChecked){
            object.closest('tr').addClass('active-bg');
        }else{
            object.closest('tr').removeClass('active-bg');
        }
    }

    HT.allChecked = () => {
        let allChecked = $('.checkBoxItem').length === $('.checkBoxItem:checked').length;
        $('#checkAll').prop('checked', allChecked);
    }
    $(document).ready(function(){
        HT.switchery();
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.changeStatusAll();

    });

})(jQuery);