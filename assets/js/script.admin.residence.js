import {
    PATHS,
    URI_FOLDER_NAME,
    PRIVILEGE
} from '/SanNicolasBIS/assets/util/frontend/client.util.js'

const doc = $(document)
const famHeadTable = $('.residence-tbl-body')
const searchBar = $('.search-bar')

doc.ready(function() 
{
    getFamilyHead(null)
})

searchBar.on('propertychange input', function () 
{ 
    getFamilyHead(this.value)
})

function getFamilyHead(query)
{  
    $.ajax({
        type: 'post',
        url: URI_FOLDER_NAME + PATHS['API_PATH'] + 'api.database.php',
        data: {
            func: 'POPULATE_TABLE_RESIDENCE',
            q: query 
        },
        success: function (response) 
        {
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
    famHeadTable.children().remove()
    if (data.length < 0)
    return

    data.forEach(item => {
        const id                    = item['residence_id']
    
        const tableRow              = $('<tr>')
        const lastNameCell          = $('<td>').text(item['last_name'])
        const firstNameCell         = $('<td>').text(item['first_name'])
        const middleNameCell        = $('<td>').text(item['middle_name']) 
        const purokCell             = $('<td>').text(item['purok'])
        const dateOfInterviewCell   = $('<td>').text(item['role'])
    
        const detailsBtn            = $('<a href="residence?details=' + id + '" class="data-util-btn more-details-btn">Details</a>').data('id', id)
        const buttonCell            = $('<td>').addClass('f-row data-btn-wrapper').append(detailsBtn)

        if (PRIVILEGE === 'ADMIN')
        {
            const updateBtn             = $('<a href="residence?update=' + id + '" class="data-util-btn update-details-btn">Edit</a>')
            const deleteBtn             = $('<a href="residence?delete=' + id + '" class="data-util-btn delete-details-btn">Delete</a>')
            buttonCell.append(updateBtn, deleteBtn)
        }
    
        tableRow.append(lastNameCell, firstNameCell, middleNameCell, purokCell, buttonCell, dateOfInterviewCell, buttonCell)
        famHeadTable.append(tableRow);
    })
}