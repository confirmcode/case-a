<script type="text/javascript">
    $(function(){
        function addNewOneClone( props ) {
            !$( ".entity-item").length && window.location.reload()
            $(".entity-list")
                .prepend( $( ".entity-item:first-child" ).clone() )
            $( ".entity-item:first-child" )
                .find('.entity-card').attr('id',props.id)
                .parent().find('.prop-id').text(props.id)
                .parent().find('.prop-sku').text(props.sku)
                .parent().find('.prop-title').text(props.title)
            $('form.form input').val('')
                
        }
        $('input.toggle-view').click(()=>{
            let choosed_view = $('.toggle-view:checked').attr('id').replace('toggle-view-','');
            if ( choosed_view == 'list' ) {
                $('.entity-list').addClass('view-list');
            } else {
                $('.entity-list').removeClass('view-list');
            }
        })
        $('form.form').on('submit',(e)=>{
            e.preventDefault();
            let data = {
                sku: $('input[name="sku"]').val(),
                title: $('input[name="title"]').val(),
            }
            // if ( data.sku.length < 5 || data.title.length < 5 ) {
            //     alert('error');
            // }
            // api/entities/
            $.post('/?path=api/entities/', data, function(e){  
                if ( e.status === 'ok' ) {
                    addNewOneClone( e.data )
                } else {
                    alert('Error was happened');
                }
            }, 'json')
        });
        $('.remove').on('click',function(e){
            if ( confirm('Confirm deletion') ) {
                let id = $(this).parents('.entity-card').attr('id').replace(/[^\d]*/g, '');
                $.ajax({
                    url: '/?path=api/entities/'+id,
                    type: 'DELETE',
                    success: function(result) {
                        $('#entity-'+id).parent().remove();
                    },
                    error: function(e) {
                        alert('Error: '+e.statusText );
                    }
                });
            }
        })
    })
</script>