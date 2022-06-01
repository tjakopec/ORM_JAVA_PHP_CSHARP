using System;
using System.ComponentModel.DataAnnotations.Schema;
namespace CSHARP.Model
{
    [Table("igrac")]
    public class Igrac: Entitet
    {
        public string? ime { get; set; }
        public string? prezime { get; set; }
        [Column("urlslika")]
        public string? urlSlika { get; set; }
        public int spol { get; set; }
        [NotMapped]
        public virtual ICollection<PartijaTriIgraca> partije { get; set; }

        public override string ToString()
        {
            return ime + " " + prezime;
        }
    }
}
