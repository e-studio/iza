function Confirmation() {

        if (confirm('Are you shure you want to delete?')==true) {
            alert('Deleted');
            window.location.href='index.php?action=inicio';
            return true;
        }else{
            return false;
        }
      }