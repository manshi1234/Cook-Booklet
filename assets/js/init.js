function RecipeJs(){
    this.featured_slider = function(){
        let recipe_slide = jQuery('.featured-slide');
        recipe_slide.owlCarousel({
            loop:true,
            margin:10, 
            nav:false,
            dots:false,
            autoplay: true,
            autoplaySpeed: 3000,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1, // Number of items to display on a small screen (e.g., mobile)
                },
                500: {
                    items: 2, // Number of items to display on a medium screen (e.g., tablet)
                },
                768: {
                    items: 3, // Number of items to display on a larger screen (e.g., desktop)
                },
                992: {
                    items: 4,
                }
            }
        });
        jQuery(document).on('click','.featured-slider-right-btn',function(){
            recipe_slide.trigger('next.owl.carousel');
        });

        jQuery(document).on('click','.featured-slider-left-btn',function(){
            recipe_slide.trigger('prev.owl.carousel');
        });
    },


    this.init = function(){
        let _this = this;

        jQuery(document).ready(function(){
            _this.featured_slider();

        });
    }
}

let _obj = new RecipeJs();
    _obj.init();