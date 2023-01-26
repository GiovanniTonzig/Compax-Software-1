
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post_medie.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <title>Domande medie</title>
    </head>
    <script src="./post_medie.js"></script>
    <script>

        var domande = []
        var risposte = []
       
        const promise1 =  $.ajax({
            url: "../php/queryDomandeMedie.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function(data) 
            {
                domande = JSON.parse(data)
             
            }
        });
        const promise2 =  $.ajax({
            url: "../php/queryRisposteMedie.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function(data) 
            {
                risposte = JSON.parse(data)
                
            }
        });

        Promise.all([promise1, promise2]).then(function(response1, response2) {
        generaForm()
        });

       

       
        

        function generaForm()
        {
            domande.forEach(function(item, i)
            {
                $('.content').append("<h1 style='text-align: center; padding-top: 2%;'> Domanda " + i + "</h1>")
                $('.content').append("<label style='font-family: system-ui, sans-serif; font-size: 1.5rem; font-weight: bold;'>" + item.domanda + "</label>")
                risposte.forEach(function(itemRisposte, iRisposte)
                {
                    if(item.id_domanda == itemRisposte.id_domanda)
                    {
                        $('.content').append(
                            "<label class='container' value='" + 
                            itemRisposte.id_risposta + 
                            "'>" + 
                            itemRisposte.risposta + 
                            "<input type='checkbox' name='" + 
                            itemRisposte.id_risposta + 
                            "' value = '" + 
                            itemRisposte.risposta +
                            "'><span class='checkmark'></span></label>"
                        )
                    }
                })
                $('.content').append("<hr></hr>")
            })
        }

    </script>
    <style>
        .header{
            background-color: rgb(245, 240, 240);
            border-radius: 10px;
            overflow: Auto;
            background-color: #EEEEEE;
            height: 600px;
            scrollbar-base-color: #2da8ff;
            scrollbar-arrow-color: #CCCCCC;
            scrollbar-track-color: #CCCCCC;
            font-size: 1.5rem;
            font-weight: bold;
            padding-top: 60px;
            overflow-x: hidden;

        }

        .divForm{
        width:1000px;  
        display:flex; 
        justify-content:column; 
        margin-left: auto; 
        }

        .paragrafo{
            display:flex;
            padding-top:20px;
            
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
           
        }

        .risultatiMedie{
            margin: 20px;
            padding: 5px;
            display: flex;
            border-radius: 4%;
            text-align: center;
            border-color: red;
        
        }

        .diploma{
            width: 15%;
             position: absolute;
            top: 10%;
            right: 1%;
            transform: rotate(10deg);
        }

        button{   
        padding: 12px 24px;
        font-size: 16px;
        color: white;
        background-color: #0063AC;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        margin-top: 20px;
        }

        button:hover {
         background-color: #4398D7;
        }
    </style>


<body>
    <section>
        

        <!--<img src="../img/cappelloViola.png" alt="" class="cappelloViola">-->
        <img src="../img/diploma.png" alt="" class="diploma">
        <img src="../img/mappamondo.png" alt="" class="mappamondo">

        <form class="form" method="POST" action="risultati_medie.php">
            <div class="header">
            <div>Benvenuto</div>
                <input type="text" style="border-color: red;" class='risultatiMedie' name="nomeStudente" value="<?php echo $_POST["nomeStudente"]?>" readonly>
                <div class="divForm">
                    <p class='paragrafo'>Scuola </p> 
                    <input type="text" class='risultatiMedie'  name="scuole" value="<?php echo $_POST["scuole"]?>" readonly>
                    <p class='paragrafo'>di</p> 
                    <input type="text" class='risultatiMedie' name="comuni" value="<?php echo $_POST["comuni"]?>" readonly>
                    <p class='paragrafo'> Provincia</p>
                    <input type="text" class='risultatiMedie' name="provincie" value="<?php echo $_POST["provincie"]?>"readonly>
                    <p class='paragrafo'>,</p>
                    <input type="text" class='risultatiMedie' name="regioni" value="<?php echo $_POST["regioni"]?>"readonly>
                </div>
                <hr>
                <div class="content">
                </div>
                <submit>
                    <button class='bottone'>
                        Invia
                    </button>
                </submit>
            </div>
        </form>

        <!--<form class="form">
            <div class="header">
                <h1>Domanda 1</h1>
                <div class="content">
                    <label class="form-control">Quale tra le seguenti riviste leggi o ti piacerebbe leggere? </label>
                    <label class="container">One
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Two
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Three
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Four
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </form>-->

    </section>
</body>
</html>
