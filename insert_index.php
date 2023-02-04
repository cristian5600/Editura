
<!DOCTYPE html>
<html lang="en">
<link href="main.css" media="screen" rel="stylesheet" title="CSS">
   <head>
   <link href="main.css" media="screen" rel="stylesheet" title="CSS">
   <link href="form2.css" media="screen" rel="stylesheet" title="CSS">
      <title>GFG- Store Data</title>
   </head>
   <body>
      <center>
       
     

      <h1>Introdu o noua carte</h1>
         <form action="insert.php" method="post">
         <p>
               <label for="titlu">Titlu:</label>
               <input type="text" name="titlu" id="titlu">
            </p>         
<p>
               <label for="nr_pagini">nr_pagini:</label>
               <input type="text" name="nr_pagini" id="nr_pagini">
            </p>
            
<p>
               <label for="an">An:</label>
               <input type="text" name="an" id="an">
            </p>
 
             
<p>
               <label for="stoc">Stoc:</label>
               <input type="text" name="stoc" id="stoc">
            </p>
 
             

 
            <input type="submit" value="Submit">
         </form>
         <form action="update_carti.php" method="post">
            <h3>Scade stocul cu 1 la cartile cu titlul:</h3>
         <p>
               <label for="titlu">Titlu:</label>
               <input type="text" name="titlu" id="titlu">
            </p>         

 
             

 
            <input type="submit" value="Submit">
         </form>

         <form action="delete_carti.php" method="post">
            <h3>Sterge Cartea cu Titlul:</h3>
         <p>
               <label for="titlu">Titlu:</label>
               <input type="text" name="titlu" id="titlu">
            </p>         

            <input type="submit" value="Submit">
         </form>


          </form>

         <form action="insert_categorie.php" method="post">
            <h3>Adauga Categoria:</h3>
         <p>
               <label for="categoria">Categoria:</label>
               <input type="text" name="categoria" id="categoria">
            </p>         

            <input type="submit" value="Submit">
         </form>
         <form action="update_categorie.php" method="post">
            <h3>Schimba prima categorie cu a doua</h3>
            <p>
               <label for="categoria1">Categoria Initiala:</label>
               <input type="text" name="categoria1" id="categoria1">
            </p> 
            <p>
               <label for="categoria2">Categoria Schimbata:</label>
               <input type="text" name="categoria2" id="categoria2">
            </p>        

 
             

 
            <input type="submit" value="Submit">
         </form>
         <form action="delete_categorie.php" method="post">
            <h3>Sterge categorie cu numele:</h3>
            <p>
               <label for="categoria">Categorie:</label>
               <input type="text" name="categoria" id="categoria">
            </p> 
                  

 
             

 
            <input type="submit" value="Submit">
         </form>
      </center>
   </body>
</html>