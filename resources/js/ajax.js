

$(document).ready(() => {
    // fetching data
    const fetchData = () => {
        $.ajax({
            url: "helper/helper.php?isFetch=true",
            type: "GET",
            dataType: 'json',
            success: ((response) => {   
                if (response) {
                    let userData = response.data;
                    let html = "";
                    userData.forEach(item => {
                        html += '<tr>';
                        html += '<td>' + item.lastName + '</td>';
                        html += '<td>' + item.middleName +'</td>';
                        html += '<td>' + item.firstName + '</td>';
                        html += '<td>' + item.age + '</td>';
                        html += '<td><input type="button" class="btn-edit" id="btn-edit" value="edit" data-id="' + item.id + '"><input type="button" class="btn-delete" id="btn-delete" value="delete" data-id="' + item.id + '"></td>';
                        html +='</tr>';   
                    });
                    $('#personsData').html(html);                    
                }else{
                        $('#userData').html('<tr><td colspan="3">No data found</td></tr>');
                }
            })
        })        
    }
    fetchData()

    // fetching selected id name
    $(document).on('click', '#btn-edit', function() {
        let userId = $(this).data('id');
        const data = {
            id: userId,
            isFind: true

        }
        $.ajax({
            url: `helper/helper.php`,
            type: "POST",
            data: data,
            dataType: 'json',
            success: (response) => {
                const data = response
                if (data.status === "success") {
                    let userData = data.data;
                    $('#txtid').val(userData.id)
                    $('#txtlastName').val(userData.lastName)
                    $('#txtfirstName').val(userData.firstName)
                    $('#txtmiddleName').val(userData.middleName)
                    $('#txtage').val(userData.age)
                }
            }
        })
    })

    // adding new person name
    $("#btnCreate").click(() => {
        let lastName = $("#txtlastName").val()
        let firstName = $("#txtfirstName").val()
        let middleName = $("#txtmiddleName").val()
        let age = $("#txtage").val()

        if(lastName == "" || firstName == "" || age === ""){
            alert("fill up first")
        }else{
        const data = {
            lastName: lastName,
            firstName: firstName,
            middleName: middleName,
            age: age,
            isTrue: true
        }
        $.ajax({
            url: "helper/helper.php",
            type: "POST",
            data: data,
            dataType: 'json',
            success: ((response) => {
                const responseData = response
                if(responseData.status === "success"){
                    alert(responseData.message)
                    $('#txtid').val("")
                    $("#txtlastName").val("")
                    $("#txtfirstName").val("")
                    $("#txtmiddleName").val("")
                    $("#txtage").val("")
                    fetchData()
                }
            })
        })            
        }


    })

    // updating person name
    $("#btnUpdate").click( function() {
        let id = $('#txtid').val()
        let lastName = $("#txtlastName").val()
        let firstName = $("#txtfirstName").val()
        let middleName = $("#txtmiddleName").val()
        let age = $("#txtage").val()

        if(lastName == "" || firstName == "" || age === ""){
            alert("fill up first")
        }else{
        const data = {
            id: id,
            lastName: lastName,
            firstName: firstName,
            middleName: middleName,
            age: age,
            toUpdate: true
        }

        $.ajax({
            url: "helper/helper.php",
            type: "POST",
            dataType: 'json',
            data: data,
            success: (response) => {
                let updateData = response
                if (updateData.status === "success") {
                    alert(updateData.message);
                    $('#txtid').val("")
                    $("#txtlastName").val("")
                    $("#txtfirstName").val("")
                    $("#txtmiddleName").val("")
                    $("#txtage").val("")
                    fetchData()
                    
                }
            }
        })
        }

    })

    //deleting person name
    $(document).on('click', '#btn-delete', function() {
        let userId = $(this).data('id');
        const data = {
            id: userId,
            toDelete: true
        }
        $.ajax({
            url: "helper/helper.php",
            type: "POST",
            data: data,
            dataType: "json",
            success: (response) => {
                let alertmessage = response
                if(alertmessage.status === "success"){
                    alert(alertmessage.message);
                    fetchData()                    
                }
            }
        })

    })
})
