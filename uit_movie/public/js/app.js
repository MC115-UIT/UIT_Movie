$(document).ready(() => {
    $('#hamburger-menu').click(() => {
        $('#hamburger-menu').toggleClass('active')
        $('#nav-menu').toggleClass('active')
    })

    // $('.trailers .clip ').click(function(){
    //     alert('your click')

    // })

       let videoSrc="";
        $('.clip').click(function() {
             videoSrc = $(this).data( "src" );
                console.log(videoSrc);
                $('.trailers #myModal').appendTo("body .trailers")
                  // when the modal is opened autoplay it  
                
                 $('#video').attr('src',videoSrc+"?autoplay=1&amp;modestbranding=1&amp;showinfo=0");



                // $('#video').attr('src',"");

        });

            // $('#myModal').on('show.bs.modal', function () {
                    
            //      // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
            //          $('#video').attr('src',videoSrc+"?autoplay=1&amp;modestbranding=1&amp;showinfo=0");

            //        })
                                  



                // stop playing the youtube video when I close the modal
                 $('#myModal').on('hidden.bs.modal', function () {
                    // a poor man's stop video
                    // var leg=$('.#video').attr("src");
                    
                      $("#myModal iframe").attr("src",  $("#myModal iframe").attr("src"));
                }) 


                   // $('.btn-close').on('click', function(e) {
        
                   //          e.preventDefault();
                   //  $("#video").attr('src','');

        




       
        // console.log($videoSrc);

          
          
      
    // setting owl carousel

    let navText = ["<i class='bx bx-chevron-left'></i>", "<i class='bx bx-chevron-right'></i>"]

    $('#hero-carousel').owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        nav:true,
        navText: navText,
        autoplay: true,
        autoplayHoverPause: true
    })

    $('#top-movies-slide').owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            500: {
                items: 3
            },
            1280: {
                items: 4
            },
            1600: {
                items: 6
            }
        }
    })

    $('.movies-slide').owlCarousel({
        items: 2,
        dots: false,
        nav:true,
        navText: navText,
        margin: 15,
        responsive: {
            500: {
                items: 2
            },
            1280: {
                items: 4
            },
            1600: {
                items: 6
            }
        }
    })
   
    $('.movie-cast').owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            500: {
                items: 2
            },
            1280: {
                items: 5
            },
            1600: {
                items: 6
            }
        }
    })
   
     $('.movie-trailer').owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav:true,
        navText: navText,
        margin: 15,
        responsive: {
            500: {
                items: 2
            },
            1280: {
                items: 4
            },
            1600: {
                items: 6
            }
        }
    })

     $('.movie-related').owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        nav:true,
        navText: navText,
        margin: 15,
        responsive: {
            500: {
                items: 2
            },
            1280: {
                items: 5
            },
            1600: {
                items: 6
            }
        }
    })
})
