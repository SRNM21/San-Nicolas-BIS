import {
    PATHS,
    FOLDER_NAME,
    URI_FOLDER_NAME,
    PRIVILEGE
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const doc = $(document)
const win = $(window)
const officialsTable = $('.brgy-officials-tbl-body')
const searchBar = $('.search-bar')

doc.ready(function() 
{
    getOfficials(null)
})

searchBar.on('propertychange input', function () 
{ 
    getOfficials(this.value)
})

function getOfficials(query)
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: {
            func: 'POPULATE_TABLE_BRGY_OFFICIALS',
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
    })
}

function populateTable(data)
{
    officialsTable.children().remove()
    if (data.length < 0)
    return

    data.forEach(item => {
        const id                = item['brgy_official_id']
    
        const tableRow          = $('<tr>')
        const lastnameCell      = $('<td>').text(item['last_name'])
        const firstnameCell     = $('<td>').text(item['first_name'])
        const middlenameCell    = $('<td>').text(item['middle_name'])
        const positionCell      = $('<td>').text(item['position'])
        const statusCell        = $('<td>').text(item['status']) 
        const dateAddedCell     = $('<td>').text(item['date_added'])
    
        const detailsBtn        = $('<a href="barangay-officials?details=' + id + '" class="data-util-btn more-details-btn">Details</a>').data('id', id)
        const buttonCell        = $('<td>').addClass('f-row data-btn-wrapper').append(detailsBtn)

        console.log(PRIVILEGE);
        if (PRIVILEGE == 'ADMIN')
        {
            const updateBtn         = $('<a href="barangay-officials/update-official?id=' + id + '" class="data-util-btn update-details-btn">Edit</a>').data('id', id)
            const deleteBtn         = $('<a href="barangay-officials?delete=' + id + '"class="data-util-btn delete-details-btn">Delete</a>').data('id', id)
            buttonCell.append(updateBtn, deleteBtn)
        }

        tableRow.append(lastnameCell, firstnameCell, middlenameCell, positionCell, statusCell, dateAddedCell, buttonCell)
        officialsTable.append(tableRow);
    })
}