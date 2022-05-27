using System;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace CSHARP.Model
{
    [Table(name: "rezultat")]
    public class Rezultat
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public int prvi { get; set; }
        public int drugi { get; set; }
        public int treci { get; set; }


        public bool isPocetak()
        {
            return prvi == 0 && drugi == 0 && treci == 0;
        }

    }
}
