
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/scriptcarousel.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
    <script>
        $(window).scroll(function() {

            if ($(this).scrollTop() > 40) {
                $(".nav-fixed").addClass('active');
                $(".block-search").addClass('sticky');

            }
            if ($(this).scrollTop() > 150) {
                $(".nav-fixed").addClass('active');
                $(".block-search").addClass('sticky');

            }
            else {
                $(".nav-fixed").removeClass('active');
                $(".block-search").removeClass('sticky');
            }
        });
        $('.menu-toggle').click(function() {
            $(this).toggleClass('active')
            $('.full-menu').addClass('active')
            $('.back-drop').addClass('active')
        })
        $('.close-menu').click(function() {
            $('.menu-toggle').removeClass('active')
            $('.full-menu').removeClass('active')
            $('.back-drop').removeClass('active')
        })
        $('.back-drop').click(function() {
            $(this).removeClass('active')
            $('.full-menu').removeClass('active')
            $('.menu-toggle').removeClass('active')

        })
        $('.btn-search-nav').click(function() {
            $('.navbar .block-search-lg').addClass('active')
        })
        $('.btn-closed').click(function() {
            $('.navbar .block-search-lg').removeClass('active')
        })
        // $(window).on('load',function(){
        //     $('.loading').addClass('complete');
        // });
        $('.scrollTop').click(function() {
            $('.scrollTop').removeClass('active')
            $(this).addClass('active')
            $('.menu-toggle').removeClass('active')

            $('.full-menu').removeClass('active')
            var getElement = $(this).attr('href');
            if ($(getElement).length) {
                var getOffset = $(getElement).offset().top - $('.navbar').height();
                $('html,body').animate({
                    scrollTop: getOffset
                }, 1000);
            }
            return false;
        })
        new WOW().init()

        valueCount = document.getElementById("quantity").value;
        if(valueCount == 0){
            valueCount = 1;
            document.getElementById("quantity").value = valueCount;
        }
        function isNumber(evt){
            var ch = String.fromCharCode(evt.which);

            if(!(/[0-9]/.test(ch))){
                evt.preventDefault()
            }
        }
        $('#quantity').keyup(function(){

            valueCount = document.getElementById("quantity").value;

            if(valueCount == 0){
                valueCount = 1;
                document.getElementById("quantity").value = valueCount;
            }



        })
        document.querySelector('.btn_plus').addEventListener("click",function(){


            valueCount++;

            document.getElementById("quantity").value = valueCount;
        })
        document.querySelector('.btn_moins').addEventListener("click",function(){


            if(valueCount > 1){
                valueCount--;
            }
            document.getElementById("quantity").value = valueCount;


        })
    </script>
