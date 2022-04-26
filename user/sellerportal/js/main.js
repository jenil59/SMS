function loadformbychange(){

    var selectoption=selectcat.category[selectcat.category.selectedIndex].text;
    
    switch(selectoption){
        case "Books":
            window.location="./addBook.php";
            break;
        case "instruments & gadjets":
            window.location="./addInstrument.php";
            break;
        case "Notes & Papers":
            window.location="./addNotes.php";
            break;
      
        default :
           
    }
    



}