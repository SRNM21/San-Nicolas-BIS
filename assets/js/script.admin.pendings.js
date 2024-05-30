import {
    PATHS,
    FOLDER_NAME,
    URI_FOLDER_NAME,
    PRIVILEGE
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const doc = $(document)
const win = $(window)
const pendingsTable = $('.pendings-tbl-body')
const searchBar = $('.search-bar')

doc.ready(function() 
{
    getPendings(null)
})

searchBar.on('propertychange input', function () 
{ 
    getPendings(this.value)
})

function getPendings(query)
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: {
            func: 'POPULATE_TABLE_PENDINGS',
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
    pendingsTable.children().remove()

    if (data.length < 0) return

    data.forEach(item => {
        const id                = item['pending_id']
    
        const tableRow          = $('<tr>')
        const lastnameCell      = $('<td>').text(item['last_name'])
        const firstnameCell     = $('<td>').text(item['first_name'])
        const middlenameCell    = $('<td>').text(item['middle_name'])
        const roleCell          = $('<td>').text(item['role'])
        const DORCell           = $('<td>').text(item['date_of_registration']) 
    
        const role              = item['role'].toLowerCase().replace(' ', '-');
        const detailsBtn        = $('<a href="pendings?details=' + id + '&role=' + role + '" class="data-util-btn more-details-btn">Details</a>').data('id', id)
        const confirmBtn        = $('<a href="pendings?confirm=' + id + '&role=' + role + '" class="data-util-btn confirm-details-btn">Confirm</a>').data('id', id)
        const deleteBtn         = $('<a href="pendings?delete=' + id + '&role=' + role + '" class="data-util-btn delete-details-btn">Delete</a>').data('id', id)
        
        const buttonCell        = $('<td>').addClass('f-row data-btn-wrapper').append(detailsBtn, confirmBtn, deleteBtn)

        tableRow.append(lastnameCell, firstnameCell, middlenameCell, roleCell, DORCell, buttonCell)
        pendingsTable.append(tableRow);
    })
}