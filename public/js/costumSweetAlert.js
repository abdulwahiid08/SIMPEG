function deleteRow(id)
    {
        swal({
            title: "Apakah Anda Yakin?",
            //   text: 'Once deleted, you will not be able to recover this imaginary file!',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#data-'+id).submit();
                swal("Data Berhasil Dihapus", {
                    icon: "success",
                });
            }
        });
    }