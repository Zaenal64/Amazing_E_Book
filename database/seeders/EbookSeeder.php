<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebook')->insert([
            ['title' => 'The Kite Runner', 'author' => 'Khaled Hosseini',
            'description' => 'Told against the backdrop of the changing political landscape of Afghanistan from the 1970s to the period following 9/11, The Kite Runner is the story of the unlikely and complicated friendship between Amir, the son of a wealthy merchant, and Hassan, the son of his father’s servant until cultural and class differences and the turmoil of war tear them asunder.'],

            ['title' => 'Number the Stars', 'author' => 'Lois Lowry',
            'description' => 'This Newbery award-winning novel tells the story of Annemarie Yohansen, a Danish girl growing up in World War II Copenhagen with her best friend, Ellen, who happens to be Jewish. When Annemarie learns about the horrors that the Nazis are inflicting on the Jewish people, she and her family stop at nothing to protect Ellen and her parents, as well as countless other Jews.'],

            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen',
             'description' => 'The opening line of this classic novel, “It is a truth universally acknowledged that a single man in possession of a good fortune must be in want of a wife” is one of the most recognizable first lines of fiction. Yet Jane Austen’s most famous work is more than a comedy of manners about the marriage market and the maneuvers of navigating polite society in 19th-century England.'],

            ['title' => 'The Outsiders', 'author' => 'S.E. Hinton',
             'description' => 'Hinton penned this novel when she was only 16 because she was tired of reading fluffy romances. She wanted a story about the harsh realities of being a teenager in mid-20th century America, and since none existed, she wrote one herself. Told from the perspective of orphan Ponyboy Kurtis, this multiple award-winning young adult novel tells the story of a group of rough, teenage boys on the streets of an Oklahoma town, struggling to survive and stick together amidst violence, peer pressure, and broken homes.'],

            ['title' => 'Little Women', 'author' => 'Louisa May Alcott',
            'description' => 'A richly written novel with a cast of memorable characters, Little Women invites us into the warm, comfortable home of a 19th-century American family. Everyone can find a character trait that resonates with them, whether Jo’s temper, Meg’s vanity, Amy’s mischievousness, or Beth’s shyness.'],

            ['title' => 'A Single Man', 'author' => 'Christopher Isherwood',
            'description' => 'While this is far from a light read, it’s one of the first novels I suggest whenever someone asks me for a book recommendation because it really packs a punch. Right to the solar plexus. The novel looks at a single day in the life of George Falconer, a middle-aged English professor grieving the loss of his partner, Jim.'],

            ['title' => 'Charlotte’s Web', 'author' => 'E.B. White',
            'description' => 'OK, let’s lighten things up a bit. Who doesn’t love a novel about talking animals? A Laura Ingalls Wilder Metal winner, E.B. White’s children’s classic about Wilber the pig and his host of barnyard friends from Charlotte the spider to Templeton the rat flings wide the door to imagination and makes us wonder what a world where animals could talk would be like.'],

            ['title' => 'The Reader', 'author' => 'Bernhard Schlink',
            'description' => 'Set in late-20th Century Germany, this novel boldly confronts long-standing German national guilt over the Nazi war crimes of the Holocaust through the strange, intergenerational relationship between 15 year-old Michael Berg and 36 year-old Hannah Schmitt, an illiterate tram operator and former Auschwitz prison guard.'],

            ['title' => 'Jane Eyre', 'author' => 'Charlotte Bronte',
            'description' => 'Bronte’s classic novel tells the tale of a young girl’s struggle to make something of herself in the world, from the tyranny she endures as a poor orphan under her Aunt’s roof and the deplorable conditions she lives in at Lowood school to the dark secrets she encounters in her role as Governess at Thornfield Hall, the home of the enigmatic and alluring Mr. Rochester.'],

            ['title' => 'The End of the Affair', 'author' => 'Graham Green',
            'description' => 'This is another one of those books filled with nuggets of truth that you might cut your teeth on, but that we all need to learn to swallow. The End of the Affair tells the story of the brief but life-altering adulterous relationship between Maurice Bendrix and Sarah Miles.'],

            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee',
            'description' => 'This one’s gotten a lot of attention with the recent announcement that Lee will be releasing a prequel this summer, so even if you’ve read it before, now might be a good time to revisit it. Told through the point of view of the 6 year-old Scout Finch, the story recounts a crisis that rocks her Alabama hometown when the African American Thom Robinson is accused of raping a young white woman.'],

            ['title' => 'Harry Potter and the Sorcerer’s Stone', 'author' => 'J.K. Rowling',
             'description' => 'K, who am I kidding? Read all of them, but you have to begin at the beginning, right? The Wizarding world of Harry Potter has captivated children and adults alike. The story of the Boy Who Lived, a downtrodden, emotionally neglected orphan who discovers he’s a wizard, ticks all the big boxes on must-read lists.'],

            ['title' => 'The Secret Garden', 'author' => 'Frances Hodgson Burnett',
            'description' => 'A beloved children’s favorite about little Mary Lennox, who goes to live in the English manor house of her reclusive uncle after her parents die of Cholera, The Secret Garden is a timeless classic about the beauty of nature, the healing power of love, and a belief in magic.'],
        ]);
    }
}
