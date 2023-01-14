$('#dodajForm').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenuto");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serijalizacija = $form.serialize();
    let red_za_unos = $form.serializeArray().reduce(function(json, {name, value}){
        json[name]=value;
        return json;
    });
    console.log("Red za unos");
    console.log(red_za_unos);
    console.log(serijalizacija);
    
    request = $.ajax({
        url:'handler/dodajUtakmicu.php',
        type:'post',
        data:serijalizacija
    });

    request.done(function(response, textStatus, jqXHR){
        if(response==="Success"){
            alert("Kolokvijum je zakazan");
            console.log("Uspesno zakazivanje");
            // location.reload(true);
            appendRow(red_za_unos);
        }
        else console.log("Kolokvijum nije zakazan "+ response);
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila: '+textStatus, errorThrown)
    });

});


function appendRow(row){
    $.get("handler/getLastUtakmica.php", function(data){
        console.log(data);
        // console.log(row.ime + " " + row.prezime + " " + row.datum_rodjenja + " " + row.pozicija + " " + row.indeks + " " + row.smer + "" + row.telefon + " " + row.email); 
        $("#tabelaUtakmica tbody").append(
            `
            <tr>
                <td>${row.datum_odigravanja}</td>
                <td>${row.vreme_odigravanja}</td>
                <td>${row.value}</td>
                <td>${row.domacin_broj_poena}</td>
                <td>${row.gost_broj_poena}</td>
                <td>${row.gost}</td>
            </tr>
            `
        );
    });



  
}