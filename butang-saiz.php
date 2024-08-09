<script>
    const saiz = document.getElementById("saiz");

    function ubahsaiz(gandaan) {
        var saiz_semasa = saiz.style.fontSize || 1;
        if (gandaan == 2) {
            saiz.style.fontSize = "1em";
        } else {
            saiz.style.fontSize = (parseFloat(saiz_semasa) + (gandaan * 0.2)) + "em";
        }
    }
</script>

<input nama='reSize1' type='button' value='reset' onclick="ubahsaiz(2)" />
<input nama='reSize' type='button' value='&nbsp;+&nbsp;' onclick="ubahsaiz(1)" />
<input nama='reSize1' type='button' value='&nbsp;-&nbsp;' onclick="ubahsaiz(-1)" />

<button onclick="window.print()">Cetak</button>