/* Template Name: Appever - Laravel 11 App Landing Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 1.0.0
   Created: July 2022
   File Description: Main JS file of the template
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Preloader            *
 *     02.  Menus                *
 *     03.  Back to top          *
 ================================*/
 window.addEventListener('load', fn, false)

 //  window.onload = function loader() {
 function fn() {
     // Preloader
     if (document.getElementById('preloader')) {
         setTimeout(() => {
             document.getElementById('preloader').style.visibility = 'hidden';
             document.getElementById('preloader').style.opacity = '0';
         }, 350);
     }
 }
/*********************/
/*     Menus         */
/*********************/

function windowScroll() {
    const navbar = document.getElementById("navbar");
    if (
        document.body.scrollTop >= 50 ||
        document.documentElement.scrollTop >= 50
    ) {
        navbar.classList.add("is-sticky");
    } else {
        navbar.classList.remove("is-sticky");
    }
}

window.addEventListener('scroll', (ev) => {
    ev.preventDefault();
    windowScroll();
})

// Navbar Active Class
try {
    var spy = new Gumshoe('#navbar-navlist a', {
        // Active classes
        // navClass: 'active', // applied to the nav list item
        // contentClass: 'active', // applied to the content
        offset: 80
    });
} catch (error) {
    
}


// Smooth scroll 
try {
    var scroll = new SmoothScroll('#navbar-navlist a', {
        speed: 800,
        offset: 80
    });
} catch (error) {
    
}

// Menu Collapse
const toggleCollapse = (elementId, show = true) => {
    const collapseEl = document.getElementById(elementId);
    if (show) {
        collapseEl.classList.remove('hidden');
    } else {
        collapseEl.classList.add('hidden');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Toggle target elements using [data-collapse]
    document.querySelectorAll('[data-collapse]').forEach(function (collapseToggleEl) {
        var collapseId = collapseToggleEl.getAttribute('data-collapse');

        collapseToggleEl.addEventListener('click', function () {
            toggleCollapse(collapseId, document.getElementById(collapseId).classList.contains('hidden'));
        });
    });
});

window.toggleCollapse = toggleCollapse;

/*********************/
/*    Back To TOp    */
/*********************/

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var mybutton = document.getElementById("back-to-top");
    if(mybutton!=null){
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            mybutton.classList.add("block");
            mybutton.classList.remove("hidden");
        } else {
            mybutton.classList.add("hidden");
            mybutton.classList.remove("block");
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/*********************/
/* Dark & Light Mode */
/*********************/
try {
    function changeTheme(e){
        e.preventDefault()
        const htmlTag = document.getElementsByTagName("html")[0]
        
        if (htmlTag.className.includes("dark")) {
            htmlTag.className = 'light'
        } else {
            htmlTag.className = 'dark'
        }
    }

    const switcher = document.getElementById("theme-mode")
    switcher?.addEventListener("click" ,changeTheme )
    
    const chk = document.getElementById('chk');

    chk.addEventListener('change',changeTheme);
} catch (err) {
    
}


/*********************/
/* LTR & RTL Mode */
/*********************/
try{
    const htmlTag = document.getElementsByTagName("html")[0]
    function changeLayout(e){
        e.preventDefault()
        const switcherRtl = document.getElementById("switchRtl")
        if(switcherRtl.innerText === "LTR"){
            htmlTag.dir = "ltr"
        }
        else{
            htmlTag.dir = "rtl"
        }
        
    }
    const switcherRtl = document.getElementById("switchRtl")
    switcherRtl?.addEventListener("click" ,changeLayout )
}
catch(err){}

/*********************/
/*   Feather Icons   */
/*********************/
feather.replace();

/*********************/
/*  Active Sidebar   */
/*********************/
(function () {
    var current = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);;
    if (current === "") return;
    var menuItems = document.querySelectorAll('.sidebar-nav a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].parentElement.className += " active";
        }
    }
})();

/*********************/
/*  Contact js   */
/*********************/
try {
    // Contact Form
    function validateForm() {
        var name = document.forms["myForm"]["name"].value;
        var email = document.forms["myForm"]["email"].value;
        var subject = document.forms["myForm"]["subject"].value;
        var comments = document.forms["myForm"]["comments"].value;
        document.getElementById("error-msg").style.opacity = 0;
        document.getElementById('error-msg').innerHTML = "";
        document.getElementById("simple-msg").innerHTML = '';
        if (name == "" || name == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Name*</div>";
            fadeIn();
            return false;
        }
        if (email == "" || email == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Email*</div>";
            fadeIn();
            return false;
        }
        if (subject == "" || subject == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Subject*</div>";
            fadeIn();
            return false;
        }
        if (comments == "" || comments == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Comments*</div>";
            fadeIn();
            return false;
        }
        var xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4) {
                const responseDiv = document.getElementById('simple-msg'); // Container for the message
                responseDiv.innerHTML = ''; // Clear previous messages
        
                if (this.status === 200) {
                    // Parse the response as JSON
                    const response = JSON.parse(this.responseText);
        
                    // Insert the raw HTML directly
                    responseDiv.innerHTML = response.message;
        
                    // Clear form fields
                    document.forms["myForm"]["name"].value = "";
                    document.forms["myForm"]["email"].value = "";
                    document.forms["myForm"]["subject"].value = "";
                    document.forms["myForm"]["comments"].value = "";
                } else {
                    // Handle error response
                    const response = JSON.parse(this.responseText);
        
                    responseDiv.innerHTML = response.message || 'Something went wrong.';
                    responseDiv.className = 'alert alert-danger';
                    fadeIn('simple-msg');
                }
            }
        };
        xhttp.open("POST", "/includes/Home/contact", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhttp.send("name=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&subject=" + encodeURIComponent(subject) + "&comments=" + encodeURIComponent(comments));
        return false;
    }

    function fadeIn() {
        var fade = document.getElementById("error-msg");
        var opacity = 0;
        var intervalID = setInterval(function () {
            if (opacity < 1) {
                opacity = opacity + 0.5
                fade.style.opacity = opacity;
            } else {
                clearInterval(intervalID);
            }
        }, 200);
    }
} catch (error) {
    console.error("An error occurred:", error); // Log to console
    document.getElementById("error-msg").innerHTML = "<div class='alert alert-danger'>An unexpected error occurred. Please try again later.</div>";
    fadeIn();
}

/*********************/
/*      WoW Js       */
/*********************/
try {
    new WOW().init();
} catch (error) {
    
}