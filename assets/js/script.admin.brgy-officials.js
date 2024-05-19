import {
    PATHS,
    FOLDER_NAME,
    URI_FOLDER_NAME
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
    console.log(query)
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
    });
}

function populateTable(data)
{
    officialsTable.children().remove()
    if (data.length < 0)
    return

    data.forEach(item => {
        const fullname      = item['lastname'] + ', ' + item['firstname'] + ' ' + item['middlename'] + ' ' + item['prefix']
        const id            = item['brgy_official_id']
    
        const tableRow      = $('<tr>')
        const fullnameCell  = $('<td>').text(fullname)
        const positionCell  = $('<td>').text(item['position'])
        const birthdateCell = $('<td>').text(item['birthdate']) 
        const genderCell    = $('<td>').text(item['gender'])
        const dateAddedCell = $('<td>').text(item['date_added'])
    
        const detailsBtn    = $('<a href="barangay-officials/profile?id=' + id + '" class="data-util-btn more-details-btn">Details</a>').data('id', id)
        const updateBtn     = $('<a class="data-util-btn update-details-btn">Edit</a>').data('id', id)
        const deleteBtn     = $('<a class="data-util-btn delete-details-btn">Delete</a>').data('id', id)
    
        const buttonCell    = $('<td>').addClass('f-row data-btn-wrapper').append(detailsBtn, updateBtn, deleteBtn)
    
        tableRow.append(fullnameCell, positionCell, birthdateCell, genderCell, dateAddedCell, buttonCell)
        officialsTable.append(tableRow);
    })
}