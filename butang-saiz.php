<script>
    function ubahsaiz(gandaan) {
        var saiz = document.getElementById("saiz");
        var saiz_semasa = saiz.style.fontSize || 1;

        if (gandaan == 2) {
            saiz.style.fontSize = "1em";
        } else {
            saiz.style.fontSize = (parseFloat(saiz_semasa) + (gandaan * 0.2)) + "em";
        }
    }
</script>

<input nama='reSize1' type='button' value='reset' onclick="ubasaiz(2)" />
<input nama='reSize' type='button' value='&nbsp;+&nbsp;' onclick="ubasaiz(2)" />
<input nama='reSize1' type='button' value='&nbsp;-&nbsp;' onclick="ubasaiz(2)" />

<button onclick="window.print()">Cetak</button>