<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
    <script>
        M.AutoInit();

        const slider= document.querySelectorAll('.slider');
        M.Slider.init(slider,{
            indicators:false,
            height:500,
            transition:600,
            interval: 3000
        });
</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('assets/js/init.js') }}"></script>
