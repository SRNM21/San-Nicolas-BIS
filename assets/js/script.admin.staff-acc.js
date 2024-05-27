import {
    PATHS,
    URI_FOLDER_NAME
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const doc = $(document)
const staffAcc = $('.staff-acc-tbl-body')
const searchBar = $('.search-bar')

doc.ready(function() 
{
    getStaff(null)
})

searchBar.on('propertychange input', function () 
{ 
    getStaff(this.value)
})

function getStaff(query)
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: {
            func: 'POPULATE_TABLE_BRGY_STAFFS',
            q: query 
        },
        success: function (response) 
        {
            console.log(response)
            populateTable(response)
        },
        error: function (error) 
        {  
            console.log(error)
        }
    });
}

function populateTable(data)
{
    staffAcc.children().remove()
    if (data.length < 0)
    return

    data.forEach(item => {
        const id                = item['staff_id']
        const username          = item['username']
    
        const tableRow          = $('<tr>')
        const lastnameCell      = $('<td>').text(item['last_name'])
        const firstnameCell     = $('<td>').text(item['first_name'])
        const middlenameCell    = $('<td>').text(item['middle_name'])
        const emailCell         = $('<td>').text(item['email'])
        const usernameCell      = $('<td>').text(username) 
    
        const updateBtn         = $('<a href="staff-accounts/update-staff-account?id=' + id + '" class="data-util-btn update-details-btn">Edit</a>').data('id', id)
        const deleteBtn         = $('<a href="staff-accounts?delete_staff_id=' + id + '&delete_staff_username='+ username+'" class="data-util-btn delete-details-btn">Delete</a>').data('id', id)
    
        const buttonCell        = $('<td>').addClass('f-row data-btn-wrapper').append(updateBtn, deleteBtn)
    
        tableRow.append(lastnameCell, firstnameCell, middlenameCell, emailCell, usernameCell, buttonCell)
        staffAcc.append(tableRow);
    })
}