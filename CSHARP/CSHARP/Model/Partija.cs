using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    [Table("partija")]
    public abstract class Partija: Entitet
    {

        [Column("dokolikoseigra")]
        public int doKolikoSeIgra { get; set; }
        public Lokacija lokacija { get; set; }
        public Igrac unosi { get; set; }
        public List<MjesanjeTriUnosa> mjesanja { get; set; }
        [NotMapped]
        public List<Igrac> igraci { get; set; }

        public virtual Rezultat getRezultat()
        {
            var r = new Rezultat();
            r.prvi = 0;
            r.drugi = 0;
            foreach(Mjesanje m in mjesanja)
            {
                r.prvi += m.getRezultat().prvi;
                r.drugi += m.getRezultat().drugi;
            }

            return r;
        }

        public bool isIgraGotova()
        {
            var r = getRezultat();
            if (r.treci == 0)
            {
                return r.prvi == r.drugi ? false : r.prvi > doKolikoSeIgra || r.drugi > doKolikoSeIgra;
            }
            else
            {
                if (r.prvi == r.drugi || r.prvi == r.treci || r.drugi == r.treci)
                {
                    return false;
                }

                if (r.prvi > doKolikoSeIgra || r.drugi > doKolikoSeIgra || r.treci > doKolikoSeIgra)
                {
                    return true;
                }

            }

            return false;
        }

    }
}
