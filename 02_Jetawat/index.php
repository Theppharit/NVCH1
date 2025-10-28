<!-- (c) Layout created by Angel Is Pretty. Odd. (https://layouts.spacehey.com/layout?id=4188) -->

<style>

    @import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
    body {
        /* background-image: url(https://i.pinimg.com/564x/24/d7/a9/24d7a917bd39cb046a807e01b69dac54.jpg); */
        background-color: #007f7e;
        background-attachment: fixed;
        font-family: Libre Franklin;
        font-size: 17px;
    }
    
    /* width */
    ::-webkit-scrollbar {
        width: 20px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
          background: #dcdedf;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #bec7c9;
        border: 2px outset;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b5bdbf;
    }
   
    p {
        color: #000;
        font-weight: 500;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-size: 12px;
        font-weight: 600;
        color: #fff;
    }

    :root {
        --logo-blue: #cfccc2;
        --darker-blue: #0000ff;
        --lighter-blue: #cfccc2;
        --even-lighter-blue: #cfccc2;
        --lightest-blue: #cfccc2;
        --dark-orange: #dc2b31;
        --light-orange: ;
        --even-lighter-orange: ;
        --green: #000;
    }
    
    nav {
        margin: 10px;
    }
    
     nav .links:before {
        display: block;
        padding-left: 5px;
        padding-bottom: 1px;
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        font-weight: 600;
        content: "spacehey - Microsoft Internet Explorer";
    }
    
    .top {
        color: transparent !important;
        height: 0 !important;
        background-color: transparent !important;
    }
    
    .top .left {
        display: none !important;
    }
    
    .top .center {
        display: none !important;
    }
    
    .search-wrapper{
        display: none !important;
    }
    
    .top .right {
        display: none !important;
    }
    
    .logout-btn{
        display: none !important;
    }
    
    .top a{
        color: transparent !important;
    }
    
    nav .links {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        padding: 0 0 3px 0;
    }
    
    nav .links a{
        font-size: 10px;
        color: #000;
        padding: 7px;
        font-weight: 500;
    }

    main {
        background: transparent;
        margin: 10px auto 10px auto;
    }
    
    .col.w-40.left h1{
        border-style: outset outset none outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        margin-bottom: 0;
    }
    
    .profile h1 {
        padding-left: 5px;
        font-family: Libre Franklin;
        font-size: 12px;
    }
    
    .col.w-40.left .general-about p{
        margin: 0;
        background: #cfccc2;
        font-weight: 500;
        color: #000;
    }
    
    .general-about {
        height: 178px;
        border-style: groove outset outset outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
        margin-top: 0;
        font-family: Times New Roman;
    }
    
    .general-about .profile-pic img {
        margin: 5px;
        height: 200px;
    }

    .general-about .details {
        margin-top: 15px;
    }

    .mood {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
        margin: 10px auto ;
    }

    .mood:before {
        display: block;
        padding-left: 5px;
        margin: 1px;
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        font-weight: 600;
        font-size: 12px;
        color: #fff;
        content: "Mood";
    }
    
    .mood p{
        font-family: Times New Roman;
        color: #000;
        padding: 5px 5px 0px 5px;
    }
    
    .profile .contact .heading, .profile .table-section .heading, .home-actions .heading {
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        padding: 0px 6px;
        margin: 1px;
    }
    
    .profile .contact, .profile .url-info, .profile .table-section, .home-actions {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
    }
    
    .contact {
        background: #cfccc2;
    }
    
    .url-info {
        background: #cfccc2;
    }
    
    .url-info p{
        font-family: Times New Roman;
        color: #000;
    }
    
    .details-table {
        background: #cfccc2;
    }
    
    .table-section {
        background: #cfccc2;
    }
    
    .details-table td {
        border-bottom-style: groove;
        padding: 1px 2px;
    }
    
    .details-table p {
        font-family: Times New Roman;
        color: #000;
    }
    
    .profile-info {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
    }
    
    .blog-preview {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
    }
    
    .blog-preview h4 {
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        padding-left: 5px;
        margin: 1px;
    }
    
    .blog-preview p {
        margin: 5px;
        font-family: Times New Roman;
        color: #000;
        font-weight: 500;
    }
    
    .blurbs {
        background: #cfccc2;
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
    }
    
    .profile .blurbs .heading {
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
        padding: 0 0 0 5px;
    }
    
    .profile .blurbs .section h4 {
        color: #000;
        padding: 0px;
        font-weight: 600;
    }
    
    .profile .blurbs .inner {
        font-family: Times New Roman;
        padding: 2 0;
    }
    
    .friends {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
        margin-bottom: 20px;
    }
    
    .profile .friends .heading {
        border-bottom-style: groove;
        background-image: url(https://i.imgur.com/CKX2NUO.png), linear-gradient(to right, #0c1058, #adcbe1);
        background-repeat: no-repeat;
        background-position: right;
    }
    
    .profile .friends .heading a {
        padding-right: 50px;
    }
    
    div.friends:nth-of-type(3) > div.inner:nth-child(2) > p:first-child > b:first-child {
        font-family: Times New Roman;
        color: #000;
    }
    
    .profile .friends .inner {
        background: #cfccc2;
    }
    
    #comments .inner {
        height: 1000px;
        overflow: auto;
    }
    
    #comments > div.inner:nth-child(2) > p:first-child > b:first-child {
        font-family: Times New Roman;
        color: #000;
    }
    
    .comments-table td {
        border-style: none groove groove none;
        border-width: 3px;
        font-family: Times New Roman;
    }
    
    .comments-table td * {
        font-family: Times New Roman;
        color: #000;
    }
    
    footer {
        border-style: outset;
        border-width: 2px;
        border-color: #fff #000 #000 #fff;
        background: #cfccc2;
        margin-bottom: 20px;
    }
    
    footer p {
        color: #000;
    }

</style>

<div class="container">
  <h1>Jetawat Thongsuwan</h1>
  <h2>Biker all around the world</h2>
  <h3>NVC</h3>
</div>

<style>.container {
  text-align: center;
  background: transparent;
  margin: 80px auto;
  padding: 20px;
  width: 100%;
}

.container h1 {
  font-size: 48px;
  font-weight: 900;
  color: #ffffff;
  text-shadow: 3px 3px 6px rgba(0,0,0,0.4);
  margin-bottom: 10px;
}

.container h2 {
  font-size: 28px;
  font-weight: 700;
  color: #e0e0e0;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
  margin-bottom: 5px;
}

.container h3 {
  font-size: 22px;
  font-weight: 600;
  color: #cfcfcf;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
}
</style>

/*aa*/