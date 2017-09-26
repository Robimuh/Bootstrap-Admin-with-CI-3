$(document).ready(function()
{
    $('#tambah-data').click(function()
    {
        $('#form-tambah').attr('style','display: block');
    });
});

function hapusMahasiswa(id)
{
	var id_mhs = $('#hapus-mhs'+id).val();
	//console.log(id_mhs);
	$.ajax({
			type: 'POST',
			url: '/crud/delete/'+id_mhs,
			data:{id:id_mhs},
			success:function(data)
			{
//alert(data);
				if (data = 1)
				{
					$('#alert-success').attr('style','display:block');
					$('#hasil'+id_mhs).remove();
				}
				else
				{
					$('#alert-failed').attr('style','display:block');
				}
			}
		});
}

function tambahMahasiswa()
{
	// var nama 	= $('#nama').val();
	// var lahir 	= $('#tgl_lahir').val();
	// var hp  	= $('#hp').val();
	// var email 	= $('#email').val();

	$.ajax({
        url : '/crud/add',
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
           //if success close modal and reload ajax table
           $('#alert-success').attr('style','display:block');
           $('#dataTable > tbody').append(data.hasil);
           // $('#nama').val('');
           // $('#tgl_lahir').val('');
           // $('#hp').val('');
           // $('#email').val('');
           $('#form-tambah').attr('style','display: none');
           $('#form-tambah').find('input').val('');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

