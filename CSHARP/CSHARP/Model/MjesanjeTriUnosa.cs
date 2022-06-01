using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    public class MjesanjeTriUnosa:MjesanjeDvaUnosa
    {
        [Column("bodovatreciunos")]
        public int bodovaTreciUnos { get; set; }
        [Column("zvanjetreciunos")]
        public int zvanjeTreciUnos { get; set; }


        public override Rezultat getRezultat()
        {
            var r = base.getRezultat();
            r.treci = bodovaTreciUnos + zvanjeTreciUnos;
            return r;
        }
    }
}
