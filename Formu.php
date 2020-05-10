<? php

classe  ContactFormulaireRquiba {

    public  $ nom ;
    


    public  $ mail ;


    public  $ tel ;


    public  $ sujet ;


    public  $ message ;
    

    public  $ webmaster ;
 

    public  $ sendCheck = null ;

     fonction  publique envoi_mail () {
       
       $ contenu_message = "Nom:" . $ this -> nom . "\ nMail:" . $ this -> mail . "\ nSujet:" . $ this -> sujet . "\ nTéléphone:" . $ this -> tel . "\ nMessage:" . $ this -> message ;
	     $ entete = "De:" . $ this -> nom . "<" . $ this -> mail . "> \ nContent-Type: text / html; charset = iso-8859-1" ;	 
       mail ( $ this -> webmaster , $ this -> sujet , $ contenu_message , $ entete );
	
	  }
  

     fonction  publique verif_null ( $ var )
    {
      return (! vide ( $ var ))? $ var : null ;
    }


     fonction  publique verif_mail ( $ var )
    {
      return ( preg_match ( '# ^ [\ w .-] + @ [\ w .-] + \. [a-zA-Z] {2,5} $ #' , $ var ))? $ var : null ;
    }


     fonction  publique verif_tel ( $ var )
    {
     return ( preg_match ( '# ^ [0-9] {9,18} $ #' , $ var ))? $ var : null ;
    }


     fonction  publique inputTrue ( $ input , $ type = '1' ) {
        
        $ style_blanc = 'style = "font-family: verdana; border: solid # 000000 1px; font-size: 8pt; color: # 000000; background-color: #ffffff"' ;
        $ style_rouge = 'style = "font-family: verdana; border: solid # 000000 1px; font-size: 8pt; color: # 000000; background-color: # ff0000"' ;
        $ test = null ;
        if ( isset ( $ _POST [ 'nom' ])) {

        commutateur ( $ type ) {
            cas  '1' : $ test = $ this -> verif_null ( $ input );
            casser ;
            
            cas  '2' : $ test = $ this -> verif_mail ( $ input );
            casser ;
        
            cas  '3' : $ test = $ this -> verif_tel ( $ input );
            casser ;
        }
        
        if ( vide ( $ test )) {
              echo  $ style_rouge ;
           } else {
              echo  $ style_blanc ;
           }
        }
    
    }
    

     fonction  publique loadForm ( $ data ) {
        extraire ( $ data );
        $ this -> nom       = trim ( htmlentities ( $ nom , ENT_QUOTES ));
        $ this -> mail      = $ this -> verif_mail ( $ mail );
        $ this -> tel       = $ this -> verif_tel ( $ tel );
        $ this -> sujet     = trim ( htmlentities ( $ sujet , ENT_QUOTES ));
        $ this -> message   = trim ( htmlentities ( $ message , ENT_QUOTES ));
        $ test = $ this -> testForm ();
        if (! vide ( $ test )) {
           $ this -> envoi_mail ();
           $ this -> printForm ();
           $ this -> sendCheck = 1 ;
        } else {
            echo  '<div style = "padding: 5px; border: solid 2px # FF0000; background-color: #FEDFDF; width: 600px; color: # ff0000;" > ' ;
              echo  'Veuillez correctement remplir les champs en rouge.' ;
            écho  '</div>' ;  
        }
    } 

  

     fonction  publique printForm () {
      echo  '<div style = "padding: 2px; margin: 2px;" > ' ;
        echo  '<h2> Votre message a bien été envoyé </h2>' ;
        echo  '<a href="./"> Envoyer un nouveau message </a> <br />' ;
        echo  '<a href="./"> Retour à la page d \' accueil </a> <br /> ' ;
      écho  '</div>' ;
      echo  '<div style = "padding: 2px; border: solid 2px # 000000; background-color: # 000001; width: 600px; color: #ffffff;" > ' ;
        echo  'Contenu de votre message envoyé' ;
      écho  '</div>' ;
      echo  '<div style = "padding: 2px; border: solid 2px # 000000; background-color: # CDE9E5; width: 600px;" > ' ;
        echo  '<ul> <li> <b> Votre nom / Raison Social: </b>' . $ this -> nom . «</li>» ;
        echo  '<li> <b> Votre mail: </b>' . $ this -> mail . «</li>» ;
        echo  '<li> <b> Téléphone: </b>' . $ this -> tel . «</li>» ;
        echo  '<li> <b> Sujet: </b>' . $ this -> sujet . «</li>» ;
        echo  '<li> <b> Votre message: </b>' . $ this -> message . «</li> </ul>» ;
      écho  '</div>' ;       
    }

   

     fonction  publique testForm () {
       if ( $ this -> verif_null ( $ this -> nom ) et $ this -> verif_null ( $ this -> mail ) et $ this -> verif_null ( $ this -> tel ) et $ this -> verif_null ( $ this - > sujet ) et $ this -> verif_null ( $ this -> message )) {
          if ( $ this -> verif_mail ( $ this -> mail ) et $ this -> verif_tel ( $ this -> tel )) {
              retour  1 ;
          }
          return  NULL ;
       }
       return  NULL ;
    }

}

?>
<? php


$ contact = new  ContactFormulaireRquiba ();


$ contact -> webmaster = 'mounir@rquiba.com' ; // Veuillez indiquer votre adresse email


if ( isset ( $ _POST [ 'nom' ])) {
    $ contact -> loadForm ( $ _POST );
}



$ send = $ contact -> sendCheck ;



if ( vide ( $ send )) {

?>
<!doctype html>
<html lang="en">
  <head>
    < div  style = " width: 600px; padding: 5px; " >
< form  method = " post " >
  < table  width = " 100% " height = " 317 " border = " 0 " >
    < tr >
      < td  width = " 30% " align = " right " valign = " middle " >
	      & nbsp; & nbsp;
      </ td >
      < td  width = " 70% " >
	      < B > Soit </ b >  < a  href = " mailto: <? Php  echo  $ le contact -> webmaster ; ?> " > Click here for Envoyer un mail Directement </ a > < br />
        < B > Ou </ b > please le REMPLIR Formulaire de contact: < br />
	    </ td >
    </ tr >
    < tr >
      < td  width = " 30% " align = " right " valign = " middle " >
	      < font  size = " 3 " face = " Verdana, Arial, Helvetica, sans-serif " > Votre nom / Raison social < b > * </ b > : </ font >
      </ td >
      < td  width = " 60% " >
	      < input  type = " text " name = " nom "   size = " 50 " <? php  $ contact -> inputTrue ( $ contact -> nom ); ?>  value = " <? php  echo  $ contact -> nom ; ?> " />
	    </ td >
    </ tr >
    < tr >
      < td  align = " right " valign = " middle " >
	      < font  size = " 3 " face = " Verdana, Arial, Helvetica, sans-serif " > Votre mail < b > * </ b > : </ font > </ td >
      < td >	    
	      < input  type = " text " name = " mail " size = " 50 " <? php  $ contact -> inputTrue ( $ contact -> mail , '2' ); ?>  value = " <? php  echo  $ contact -> mail ; ?> " />  
      </ td >
    </ tr >
    < tr >
      < td  align = " right " valign = " middle " >
        < font  size = " 3 " face = " Verdana, Arial, Helvetica, sans-serif " > Tél < b > * </ b > : </ font > </ td >
      < td >  
	      < input  type = " text " name = " tel " size = " 20 " <? php  $ contact -> inputTrue ( $ contact -> tel , '3' ); ?>  value = " <? php  echo  $ contact -> tel ; ?> " />
      </ td >
    </ tr >
      < td   align = " right " valign = " middle " >
	      < font  size = " 3 " face = " Verdana, Arial, Helvetica, sans-serif " > Sujet < b > * </ b > : </ font >
      </ td >
      < td >
	      < input  type = " text " name = " sujet " size = " 50 " <? php  $ contact -> inputTrue ( $ contact -> sujet ); ?>  value = " <? php  echo  $ contact -> sujet ; ?> " />
      </ td >
    </ tr >
    < tr >
      < td  height = " 181 " align = " right " valign = " top " >
	      < font  size = " 3 " face = " Verdana, Arial, Helvetica, sans-serif " > Message   < b > * </ b >   : </ font >
      </ td >
      < td  valign = " top " >  
        < textarea  name = " message "   cols = " 47 " <? php  $ contact -> inputTrue ( $ contact -> message ); ?>  rows = " 10 " > <? php  echo  $ contact -> message ; ?> </ textarea >
      </ td >
    </ tr >
    < tr >
      < td >
        & nbsp;  
      </ td >
      < td  valign = " TOP " >
	      ( < b > * </ b > ) Champ obligatoire.   
      </ td >
    </ tr >
    < tr >
      < td >
        & nbsp;  
      </ td >
      < td  valign = " TOP " >
	      < input  type = " submit " style = " font-family: verdana; padding: 5px 45px 5px 45px; border: solid # 000000 2px; font-size: 8pt; color: #ffffff; background-color: # 32269F "   name = " envoyer " value = " Envoyer " />
      </ td >
    </ tr >
  </ table >
</ formulaire >
</ div >
<? php 
}
</body>
</html>
?>