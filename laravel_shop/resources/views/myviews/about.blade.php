<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="header"><x-header name="header"></x-header></div>
<style>
        body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
        }

        html {
                box-sizing: border-box;
        }

        *, *:before, *:after {
                box-sizing: inherit;
        }

        .column {
                float: left;
                width: 33.3%;
                margin-bottom: 16px;
                padding: 0 8px;
        }
        img.kante {
                height: 303px;
        }
        img.mouse {
                height: 303px;
        }
        img.havert {
                height: 303px;
        }

        .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                margin: 8px;
        }
        .container {
                padding: 0 16px;
        }

        .container::after, .row::after {
                content: "";
                clear: both;
                display: table;
        }

        .title {
                color: grey;
        }

        .button {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
        }

        .button:hover {
                background-color: #555;
        }

        @media screen and (max-width: 650px) {
                .column {
                        width: 100%;
                        display: block;
                }
                h2 {
                        color: #001489;
                }
        }
</style>
<h2 style="text-align:center">Chelsea Team</h2>
<div class="row">
        <div class="column">
                <div class="card">
                        <img class="havert" src="https://static.bongda24h.vn/medias/standard/2021/4/11/kai-havertz-noi-ve-tran-dau-voi-crystal-palace.jpg" alt="Jane" style="width:100%">
                <div class="container">
                        <h2>Kai Havert</h2>
                        <p class="title">Football player</p>
                        <p>Germany Team.</p>
                        <p>havert@chelsea.com</p>
                        <p><button class="button">See more </button></p>
                </div>
        </div>
</div>

<div class="column">
        <div class="card">
                <img class="kante" src="https://image.thanhnien.vn/1024/uploaded/gianglao/2021_05_30/kantecham_rsux.jpeg" alt="Mike" style="width:100% height:303px">
                <div class="container">
                        <h2>N'golo Kante</h2>
                        <p class="title">Football player</p>
                        <p>France Team.</p>
                        <p>kante@chelsea.com</p>
                        <p><button class="button">See more </button></p>
                </div>
        </div>
</div>
  
<div class="column">
        <div class="card">
                <img class="mouse" src="http://media.tinthethao.com.vn/files/bongda/2021/07/03/mason-mount-la-ai-0826jpg.jpg" alt="John" style="width:100%">
                <div class="container">
                        <h2>Mason Mouse</h2>
                        <p class="title">Football player</p>
                        <p>England Team.</p>
                        <p>mouse@chelsea.com</p>
                        <p><button class="button">See more</button></p>
                </div>
        </div>
</div>
</div>
<x-alert></x-alert>
<style type="text/css">
        div.header{

                height: 80px;
        }
</style>
