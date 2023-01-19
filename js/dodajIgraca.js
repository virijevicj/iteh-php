$('#dodajForm').submit(function(){
    event.preventDefault();
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serijalizacija = $form.serialize();
    let red_za_unos = $form.serializeArray().reduce(function(json, {name, value}){
        json[name]=value;
        return json;
    });

    request = $.ajax({
        url:'handler/dodajIgraca.php',
        type:'post',
        data:serijalizacija
    });

    request.done(function(response, textStatus, jqXHR){
        if(response==="Success"){
            alert("Igrac uspesno dodat!");
            appendRow(red_za_unos);
        }
        else alert("Greska prilikom dodavanja igraca.\nProbajte ponovo!");
    });

});


function appendRow(row){
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
};
        
