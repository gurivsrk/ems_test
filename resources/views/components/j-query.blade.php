<div id="sideALert">
    <div class="alert" role="alert"></div>
</div>
<script>
    jQuery(function($) {

        const alert = (classs,textt) =>{
            $('#sideALert').fadeIn(200,function(){
                $(this).children('.alert').addClass(classs).text(textt)
            }).delay(4000).fadeOut()
        }

        const saveTicket = ()=>{
            $('.ticketSave').on('click',function(event){
                event.preventDefault()
                let validate = false
                const $this = $(this)
                let attrD
                $.each($this.parent().siblings().children('input'), function(){
                     attrD = $(this).attr('id') 
                     attrD = attrD.includes('-') ?  attrD : attrD+'-1'  
                     $(this).attr('id',attrD)
                    $(this).next('.valid-feedback').removeClass('fail').hide()
                    if($(this).val().trim() == ''){
                       $(this).next('.valid-feedback').addClass('fail').fadeIn().text('*please fill the field') 
                       validate =true
                    }
                    
                })
                if(validate === true){
                    alert('alert-danger','Please fill Blank fields')
                    return true
                }
                $('#submit').removeAttr('disabled')
                if($this.text() == 'Edit'){
                    $this.parent().siblings().children('input').removeAttr('readonly')
                    $this.parent().siblings('.jD').addClass('noD')
                    $this.text('save')
                    return null
                }
                $this.parent().siblings().children('input').attr('readonly','readonly')
                $this.parent().siblings('.jD').removeClass('noD')
                $this.text('Edit')
            })
        }
        const deleteTicket = ()=>{
            $('.ticketDelete').on('click',function(e){
                e.preventDefault()
                const $this = $(this)
                $this.parent().parent().parent('.newTicket').remove()
            })
        }

        const checkAttr = (type) => {
            $('input#'+type).on('blur',function(){
                const $this = $(this)
                let validate = false
                const err = ($this.attr('id') == 'emsticketNo') ? 'ticket no' : 'id'
                const inType = ($this.attr('id') == 'emsticketNo') ? '.emsticketNo' : '.emsId'
               $.each($(inType),function(){
                    if($(this).attr('id') != $this.attr('id') && $(this).val() == $this.val()){
                        validate = true
                       return true
                    }
               })
               
               if(validate === true){
                alert('alert-danger','Duplicate '+err)
                $this.parent().siblings().children('.ticketSave').attr('disabled','disabled')
               }
               else{
                $this.parent().siblings().children('.ticketSave').removeAttr('disabled')
               }
            })
        }

        const checkPrice = () => {
            $('input#price').on('blur',function(){
                const $this = $(this)
                let validate = false
                
            if($.isNumeric($this.val()) === false){
                alert('alert-danger','Price must be number type')
                $this.parent().siblings().children('.ticketSave').attr('disabled','disabled')
            }
            else{
                $this.parent().siblings().children('.ticketSave').removeAttr('disabled')
               }

               
            //    if(validate === true){
            //     alert('alert-danger','Duplicate '+err)
            //     $this.parent().siblings().children('.ticketSave').attr('disabled','disabled')
            //    }
            //    else{
            //     $this.parent().siblings().children('.ticketSave').removeAttr('disabled')
            //    }
            })
        }

        $('#addTicket').on('click',()=>{
            if($('#dynamicTickets').html() != ''){
                let validate = false;
                const id = [], ticketNO = []
                $.each($('.newTicket'),function(){
                    if($(this).find('.ticketSave').text() == 'Save'){
                        alert('alert-danger','Please fill Blank fields')
                        validate = true
                    }
                })
                if(validate === true){
                    return true;
                }
            }
            $('#submit').attr('disabled','disabled')
            data = { 'required':'no data' }
            $.ajax({
                type: "get",
                url: "{{route('processForm.create')}}",
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                data: {data},
                beforeSend: function(){
                 $('#addTicket').text('wait.....').attr('disabled','disabled')
                },
                success : function(text){
                    $('#dynamicTickets').prepend(text);
                    $('#addTicket').text('Add New Ticket').removeAttr('disabled')
                    saveTicket()
                    deleteTicket()
                    checkAttr('emsId')
                    checkPrice()
                }
            });   
        })
    
    })
</script>