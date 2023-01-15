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
        url:'handler/dodajIgraca.php',
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
    $.get("handler/getLast.php", function(data){
        console.log(data);
        var id = data;
        // console.log(row.ime + " " + row.prezime + " " + row.datum_rodjenja + " " + row.pozicija + " " + row.indeks + " " + row.smer + "" + row.telefon + " " + row.email); 
        $("#tabelaIgraca tbody").append(
            `
            <tr>
                <td>${row.value}</td>
                <td>${row.prezime}</td>
                <td>${row.datum_rodjenja}</td>
                <td>${row.pozicija}</td>
                <td>${row.indeks}</td>
                <td>${row.smer}</td>
                <td>${row.telefon}</td>
                <td>${row.email}</td>
                
            </tr>
            `
        );
        location.reload();
    });



  
}