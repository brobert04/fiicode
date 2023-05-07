<!-- jQuery -->
<script src="{{ asset('../assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('../assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('../assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('../assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('../assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('../assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('../assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('../assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../assets/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('../assets/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    document.querySelector('#dark').addEventListener('click', function(n) {
        document.querySelector('body').classList.toggle('dark-mode');
        document.querySelector('nav').classList.toggle('navbar-dark');
        document.querySelector('#but').classList.toggle('fa-sun');
    });
</script>
@yield('custom-js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

        }
    });
    let typingIndicator = document.querySelector('.typing-indicator');
    function showTypingIndicator() {
    typingIndicator.style.display = 'inline-block';
    }

    function hideTypingIndicator() {
    typingIndicator.style.display = 'none';
    }
    var element = $('.floating-chat');
    var myStorage = localStorage;
    setTimeout(function() {
        element.addClass('enter');
    }, 1000);
    element.click(openElement);
    function openElement() {
        var messages = element.find('.messages');
        var textInput = element.find('.text-box');
        element.find('>i').hide();
        element.addClass('expand');
        element.find('.chat').addClass('enter');
        var strLength = textInput.val().length * 2;
        textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
        element.off('click', openElement);
        element.find('.header button').click(closeElement);
        element.find('#sendMessage').click(sendNewMessage);
        messages.scrollTop(messages.prop("scrollHeight"));
    }
    function closeElement() {
        element.find('.chat').removeClass('enter').hide();
        element.find('>i').show();
        element.removeClass('expand');
        element.find('.header button').off('click', closeElement);
        element.find('#sendMessage').off('click', sendNewMessage);
        element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
        setTimeout(function() {
            element.find('.chat').removeClass('enter').show()
            element.click(openElement);
        }, 500);
    }

    function sendNewMessage() {
        var userInput = $('.text-box');
        var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');
        if (!newMessage) return;
        var messagesContainer = $('.messages');
        messagesContainer.append([
            '<li class="self">',
            newMessage,
            '</li>'
        ].join(''));
        $.ajax({
            type:'post',
            url: '{{url('send-chat')}}',
            data: {
                'input': newMessage
            },
            success: function(data){
                respondToUser(data);
                // clean out old message
            },
        })
        userInput.html('');
        // focus on input
        userInput.focus();
        messagesContainer.finish().animate({
            scrollTop: messagesContainer.prop("scrollHeight")
        }, 250);
    }

    function respondToUser(raspuns){
        console.log(raspuns);
        var messagesContainer = $('.messages');
        messagesContainer.append([
            '<li class="other">',
            raspuns,
            '</li>'
        ].join(''));
    }

    function onMetaAndEnter(event) {
        if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
            sendNewMessage();
        }
    }
</script>
