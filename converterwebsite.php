<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectedInputType = isset($_POST['selectMethod']) ? $_POST['selectMethod'] : '';
    $input = $_POST['inputSequence'];
    

    if($selectedInputType == "DNA"){
       
        $onlyLetters = '/^[AGCT]*$/';
        if(preg_match($onlyLetters, $input)){
            
            $dnaInput = $input;
            $rnaInput = $input;
            $rnaInput = str_replace("A","U",$rnaInput);
            $rnaInput = str_replace("G","O",$rnaInput);
            $rnaInput = str_replace("C","G",$rnaInput);
            $rnaInput = str_replace("O","C",$rnaInput);
            $rnaInput = str_replace("T","A",$rnaInput);
        }else{
            
            $dnaInput = null;
            $rnaInput = null;
        }

    }else if($selectedInputType == "RNA"){
        $onlyLetters = '/^[AGCU]*$/';
        if(preg_match($onlyLetters, $input)){
            $rnaInput = $input;
            $dnaInput = $input;
            $dnaInput = str_replace("A","T",$dnaInput);
            $dnaInput = str_replace("G","O",$dnaInput);
            $dnaInput = str_replace("C","G",$dnaInput);
            $dnaInput = str_replace("O","C",$dnaInput);
            $dnaInput = str_replace("U","A",$dnaInput);
        }else{
            $dnaInput = null;
            $rnaInput = null;
        }

    }else{
        echo "error occured";
    }





} else {
    echo "No input received.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
</head>

<style>

.header{
    background-color: #defcf9;
    padding: 15px;  
    margin-top: auto; 
    display: flex; /* Enable flexbox for the container */
    align-items: center;
    
}

.title{
    font-family: Arial, sans-serif;
    font-size: 25px;
}

img {
    
    height: 80px;
    width: 80px;
    padding-right: 10px;
    height: auto;    
}

.container{
    padding: 10px; 
}

.titleHeader{
   
    font-family: Arial, sans-serif;
    height: 10vh;        
    display: flex;   
    justify-content: center;
}

.formOuter{
    display: inline-block;
    margin: 10px;
    height: 10vh;
    display: flex;
    justify-content: center;
    padding: 10px;
}

.outery{
    display: inline-block;
    display: flex;
    justify-content: center;
    
}

.outer{
    flex-direction: column;
    align-items: center;
    display: flex;
    justify-content: center;
    height: 10vh;
    display: inline-block;          /* Allow outer div to resize based on inner content */
    background-color: #defcf9;   /* Background color */
    border: 1px solid #000;        /* Border for visibility */
    border-radius: 5px;            /* Optional rounded corners */
    padding: 10px;                 /* Padding for spacing */
    text-align: center;             /* Center text */
    margin: 20px;                  /* Margin for spacing */
}


.dnaInput {
    font-family: Arial, sans-serif;
    display: inline-block;
    display: flex;
    padding: 10px;
    text-align: center;
}

.formDiv{
    
    height: 50px;
    width: 50%;
    text-align: center;
}

.formCss{
    margin-left:  auto;
    margin-right: auto;
    text-align: center; 
}

.rnaInput {    
    font-family: Arial, sans-serif;
    display: inline-block;
    display: flex;
    padding: 10px;
    text-align: center;
}

.paragraph{
    font-family: Arial, sans-serif;
    margin-left:  auto;
    margin-right: auto;
    text-align: center;
}

.warning{
    font-family: Arial, sans-serif;
    font-size: 12px;
    color: red;
    margin-left:  auto;
    margin-right: auto;
    text-align: center;
}

</style>

<body>
    <a href="converterwebsite.php"></a>
    <div class="header">
        <div>
            <img src="dnaimage.png" alt="Placeholder Image">
        </div> 
        <div class="title">
            <p>DNA <br>
                RNA <br>
                Protein
            </p>
        </div>
    </div>

    <div class= "container">
        <div class = "titleHeader">
                <h1>Choose DNA or RNA</h1>
        </div>
        <div class="formOuter">
            <div class="formDiv">

                <form action="converter.php" method="post" class="formCss">
                    <select name="selectMethod" id="method">
                        <option value="DNA">DNA</option>
                        <option value="RNA">RNA</option>
                    </select>
                    <label for="inputSequence"></label>
                    <input type="text" name="inputSequence">
                    <input type="submit" value="convert">
                </form>

            </div>
        </div>
        
        <p class="paragraph">DNA:</p>
        <p class="warning"><?php if($rnaInput == null){echo "Use A, T, G, C";}; ?></p>
        <div class="outer">
            <div class="dnaInput">
                <p class="paragraph"><?php echo "{$dnaInput}"; ?></p>
            </div>
        </div> 

        <div class="outery">

        </div>
        <p class="paragraph">RNA:</p>
        <p class="warning"><?php if($rnaInput == null){echo "Use A, U, G, C";}; ?></p>
        <div class="outer">
            <div class="rnaInput">
                <p class="paragraph"><?php echo "{$rnaInput}"; ?></p>
            </div>
        </div>
    </div>
    <div class="header">
        <p class="paragraph">
            Github: <a href="https://github.com/Daontiveros">here</a> 
            Linkedin: <a href="https://www.linkedin.com/in/dayannaontiveros485bba2b4/">here</a> 
        </p>
    </div>

    

</body>
</html>
