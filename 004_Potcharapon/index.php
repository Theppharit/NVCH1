<!-- (c) Layout created by Bela (https://layouts.spacehey.com/layout?id=344) -->

<style>
/*==========⚠️==========
* for colors go to https://htmlcolorcodes.com/color-names
* for fonts go to https://fonts.google.com
* for cursors go to https://icons8.com , https://custom-cursor.com , https://www.cursors-4u.com
============⚠️==========*/

/* cursors */

a:hover {
    cursor: url('https://cur.cursors-4u.net/cursors/cur-7/cur668.cur'), auto;
}

* {
    cursor: url('https://cur.cursors-4u.net/cursors/cur-7/cur671.cur'), auto;
}

</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Gotu&display=swap');
</style>
<style>
:root {
    --headers: #ec5a5a;
    --text: pink;
    --names: #ec5a5a;
    --links: pink;
    --hover: #f3d7d7;
    --borders: 1px solid #f3d7d7 !important;
    --background_image: url("https://i.imgur.com/6zCbRs2.png");
    --font-family: 'Gotu', sans-serif;
    --curve: 0px;
    --simple_bg: #ffffff;
}

main .left {
    padding-right: 20px;
}

.url-info {display: none !important;} /* to hide the url */
.blurbs .heading{display: none !important;} /* to hide the blurbs heading */

h3, h4, h5, .url-info b {color: var(--headers) !important;} /* headings*/
a {color: var(--links) !important;} /* color of links */
a:hover {color: var(--hover) !important;} /* color of links on hover */
p, h2 {color: var(--text) !important;} /* color of text */
h1, .friends a p {color: var(--names) !important;} /* color of names, and friends counter */
h1, .friends a:hover p {color: var(--hover) !important;} /* color of names on hover */
nav label {color: var(--links) !important;} /* color of search */
.section h4 {color: var(--headers) !important; text-align: center;} /* aboutme & want2meet headings */
.comment-reply:not(:first-child) {border-top: 3px double hotpink;} /* line in between comment replies*/
.count {color: #f3d7d7;}

/* text decoration */

a:hover, a:active, .blog-entry .kudos-btn:hover, .blog-entry .kudos-btn:active {
    text-decoration: underline;
    text-decoration-style: wavy;
}

.logout-btn:hover, .logout-btn:active {
    text-decoration: underline;
    text-decoration-style: wavy;
}

nav .top a:hover {
    text-decoration: underline;
    text-decoration-style: wavy;
}

nav .links a:hover {
    text-decoration: underline;
    text-decoration-style: wavy;
}

/* font family */

h2, h3, h4, h5, a, p, nav label, .section {
    font-family: var(--font-family) !important;
    font-size: 12px!important;
}

/* padding and margin */

.icon {
    border: none !important;
}

.blurbs {
    margin-top: 10px !important;
    margin-bottom: 30px !important
}

.friends {
    margin-top: -10px !important;
    margin-bottom: 30px !important
}

.profile-info {
    border-radius: var(--curve) !important;
}

.comment-replies {
    border: 5px dotted pink;
}

.comments-table {
    border-radius: var(--curve) !important;
    border: none !important;
}

.table-section {
    padding-bottom: 7px !important;
    margin-top: 30px!important
}

#comments {
    margin-top: 5px !important;
    padding-bottom: 5px !important
}

.details p:last-child {
    color: var(--links) !important;
    filter: brightness(95%);
}

.mood {
    margin-top: 20px;
}

/* background image */

body {
    background-image: var(--background_image) !important;
    background-color: white !important;
    background-repeat: repeat;
    background-size: 120px;
}

/* navigation */

/* change logo color at https://codepen.io/sosuke/pen/Pjoqqp */

nav {
    background: white;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
    margin-bottom: 30px;
    border: var(--borders);
}

nav .top {
    background: rgba(0, 0, 0, 0.0);
}

nav .top a {
    color: pink!important;
}

nav .links {
    background: transparent!important;
    text-align: center;
}
nav .links a{
text-shadow:none;
}

nav img.logo {
    filter: brightness(0) saturate(100%) invert(76%) sepia(42%) saturate(432%) hue-rotate(305deg) brightness(104%) contrast(105%);
    !important;
}

nav .links li:not(:last-child)::after, footer .links li:not(:last-child)::after {
    content: " | ";
    color: var(--headers);
}

/*============= color the search bar and button ===================*/

.search-wrapper input[type=text] {
    background-color: rgba(0, 0, 0, 0.0) !important;
    border: 2px solid pink !important;
    color: pink !important;
    border-radius: 0px !important;
}

button {
    border-radius: 0px !important;
    border: 0px solid pink!important;
    font-family: var(--font-family) !important;
    background-color: rgba(0, 0, 0, 0.0) !important;
    color: pink!important;
}

/*============= online icon  ===================*/

.online {
    content: url(https://dl.glitter-graphics.com/pub/272/272679lz7b9hcea1.gif);
}

/*============= profile name ===================*/

h1 {
    padding-left: 20px !important;
    font-family: 'Gotu', sans-serif;
    font-size: 25px !important;
    margin-top: -10px!important;
    color: var(--links)!important;
}

/*============= box shadows ===================*/

.mood, .blog-preview, .contact {
    margin-bottom: 30px;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
}

.table-section, .blurbs, .friends {
    margin-bottom: 30px !important;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
}

.friends {
    margin-top: 10px!important;
}

.profile-info {
    background: white;
    border: var(--borders)!important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px 5px;
    margin-bottom: 30px;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
}

.profile-info .inner {
    font-weight: bold;
    text-align: center;
}

.contact {
    background: white;
    padding: 20px;
    margin-bottom: 40px!important;
}

main {
    background: transparent;
    padding: 6px 0px;
}

.profile-pic img {
    outline: none !important;
    border: none!important;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
}

.friends-grid img {
    outline: none !important;
    filter: opacity(90%) !important;
    border-radius: var(--curve) !important;
}

td {
    background-color: transparent!important;
}

hr {
    border-top: 1px solid pink;
}

.heading, .url-info, .blurbs, .friends, .table, .table-section, footer {
    border-radius: var(--curve) !important;
    padding: 2px !important;
    border: var(--borders) !important;
}

.friends, .blurbs {
    background: white;
}

.mood, .contact, .blog-preview {
    border-radius: var(--curve) !important;
    padding: 2px !important;
    border: var(--borders) !important;
}

.mood, .blog-preview {
    text-align: center;
    background: white;
    border: var(--borders) !important;
}

.table-section {
    border: var(--borders) !important;
    background-color: white!important;
    border-radius: var(--curve) !important;
}

.heading {
    background: transparent!important;
    padding-bottom: 4px !important;
    background-size: 100%100%!important;
    text-align: center;
    border: none!important;
}

.comments-table {
    display: block;
    height: 500px!important;
    overflow-y: scroll;
    border: var(--borders) !important;
    outline: none !important;
    border: none!important;
}

.comments-table td {
    background-image: url('') !important;
    background-size: cover;
    border: var(--borders);
}

.comments-table td:first-child img {
    /* you can clip images at https://bennettfeely.com/clippy and add the code here */
}

footer {
    color: var(--text);
    text-align: center;
    font-size: 60%;
    margin: 10px 0 10px;
    padding: 10px 5px;
    background: white;
    box-shadow: calc((400px + (25px * 2)) * 0.025) calc((400px + (25px * 2)) * 0.025) #f6e3e3;
}

</style>
<style>
/* Force scrollbars onto browser window */

/* Scrollbar styles */

::-webkit-scrollbar {
    width: 5px;
    height: 12px;
}

::-webkit-scrollbar-track {
    border-radius: 0px;
    width: 2px;
    border: 1px dotted hotpink;
}

::-webkit-scrollbar-thumb {
    background: pink;
    border-radius: 0px;
}

::-webkit-scrollbar-thumb:hover {
    background: hotpink;
}



</style>
<div class="container">
  <h1>Potcharapon Poolsawat</h1>
  <h2>Gamer</h2>
  <h3>NVC</h3>
</div>

<style>
.container {
  text-align: center;         
  position: absolute;          
  top: 50%;               
  left: 50%;                   
  transform: translate(-50%, -50%); 
}
</style>
