-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l3_khalil`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `ID` int(11) NOT NULL,
  `Author_ID` int(3) NOT NULL,
  `Quote` text NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Subject_1_ID` int(3) NOT NULL,
  `Subject_2_ID` int(3) NOT NULL,
  `Subject_3_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`ID`, `Author_ID`, `Quote`, `Notes`, `Subject_1_ID`, `Subject_2_ID`, `Subject_3_ID`) VALUES
(1, 1, 'The world as we have created it is a process of our thinking. It cannot be changed without changing our thinking. ', '', 10, 81, 91),
(2, 27, 'It is our choices, Harry, that show what we truly are, far more than our abilities. ', '', 1, 14, 0),
(3, 1, 'There are only two ways to live your life. One is as though nothing is a miracle. The other is as though everything is a miracle. ', '', 46, 53, 58),
(4, 31, 'The person, be it gentleman or lady, who has not pleasure in a good novel, must be intolerably stupid. ', '', 9, 16, 42),
(5, 38, 'Imperfection is beauty, madness is genius and it\'s better to be absolutely ridiculous than absolutely boring. ', '', 46, 44, 34),
(6, 1, 'Try not to become a man of success. Rather become a man of value. ', '', 3, 79, 87),
(7, 5, 'It is better to be hated for what you are than to be loved for what you are not. ', '', 53, 55, 40),
(8, 48, 'I have not failed. I\'ve just found 10,000 ways that won\'t work. ', 'paraphrased', 27, 46, 0),
(9, 14, 'A woman is like a tea bag; you never know how strong it is until it\'s in hot water. ', 'misattributed-eleanor-roosevelt', 90, 90, 11),
(10, 45, 'A day without sunshine is like, you know, night. ', '', 42, 62, 76),
(11, 38, 'This life is what you make it. No matter what, you\'re going to mess up sometimes, it\'s a universal truth. But the good part is you get to decide how you\'re going to mess it up. Girls will be your friends - they\'ll act like it anyway. But just remember, some come, some go. The ones that stay with you through everything - they\'re your true best friends. Don\'t let go of them. Also remember, sisters make the best friends in the world. As for lovers, well, they\'ll come and go too. And baby, I hate to say it, most of them - actually pretty much all of them are going to break your heart, but you can\'t give up because if you give up, you\'ll never find your soulmate. You\'ll never find that half who makes you whole and that goes for everything. Just because you fail once, doesn\'t mean you\'re gonna fail at everything. Keep trying, hold on, and always, always, always believe in yourself, because if you don\'t, then who will, sweetie? So keep your head high, keep your chin up, and most importantly, keep smiling, because life\'s a beautiful thing and there\'s so much to smile about. ', '', 53, 79, 27),
(12, 27, 'It takes a great deal of bravery to stand up to our enemies, but just as much to stand up to our friends. ', '', 18, 33, 18),
(13, 1, 'If you can\'t explain it to a six year old, you don\'t understand it yourself. ', '', 77, 86, 0),
(14, 7, 'You may not be her first, her last, or her only. She loved before she may love again. But if she loves you now, what else matters? She\'s not perfect”you aren\'t either, and the two of you may never be perfect together but if she can make you laugh, cause you to think twice, and admit to being human and making mistakes, hold onto her and give her the most you can. She may not be thinking about you every second of the day, but she will give you a part of her that she knows you can break”her heart. So don\'t hurt her, don\'t change her, don\'t analyze and don\'t expect more than she can give. Smile when she makes you happy, let her know when she makes you mad, and miss her when she\'s not there. ', '', 55, 0, 0),
(15, 12, 'I like nonsense, it wakes up the brain cells. Fantasy is a necessary ingredient in living. ', '', 29, 0, 0),
(16, 11, 'I may not have gone where I intended to go, but I think I have ended up where I needed to be. ', '', 53, 61, 0),
(17, 15, 'The opposite of love is not hate, it\'s indifference. The opposite of art is not ugliness, it\'s indifference. The opposite of faith is not heresy, it\'s indifference. And the opposite of life is not death, it\'s indifference. ', '', 2, 45, 64),
(18, 17, 'It is not a lack of love, but a lack of friendship that makes unhappy marriages. ', '', 55, 33, 56),
(19, 39, 'Good friends, good books, and a sleepy conscience: this is the ideal life. ', '', 9, 33, 0),
(20, 4, 'Life is what happens to us while we are making other plans. ', 'misattributed-john-lennon', 30, 53, 68),
(21, 42, 'I love you without knowing how, or when, or from where. I love you simply, without problems or pride: I love you in this way because I do not know any other way of loving but this, in which there is no I or you, so intimate that your hand upon my chest is my hand, so intimate that when I fall asleep your eyes close. ', '', 55, 69, 0),
(22, 43, 'For every minute you are angry you lose sixty seconds of happiness. ', '', 39, 0, 0),
(23, 41, 'If you judge people, you have no time to love them. ', 'attributed-no-source', 66, 48, 55),
(24, 18, 'Anyone who thinks sitting in church can make you a Christian must also think that sitting in a garage can make you a car. ', '', 42, 73, 0),
(25, 32, 'Beauty is in the eye of the beholder and it may be necessary from time to time to give a stupid or misinformed beholder a black eye. ', '', 42, 0, 0),
(26, 12, 'Today you are You, that is truer than true. There is no one alive who is Youer than You. ', '', 17, 53, 93),
(27, 1, 'If you want your children to be intelligent, read them fairy tales. If you want them to be more intelligent, read them more fairy tales. ', '', 12, 70, 12),
(28, 27, 'It is impossible to live without failing at something, unless you live so cautiously that you might as well not have lived at all - in which case, you fail by default. ', '', 53, 27, 79),
(29, 1, 'Logic will get you from A to Z; imagination will get you everywhere. ', '', 43, 0, 0),
(30, 7, 'One good thing about music, when it hits you, you feel no pain. ', '', 60, 0, 0),
(31, 12, 'The more that you read, the more things you will know. The more that you learn, the more places you\'ll go. ', '', 50, 70, 75),
(32, 27, 'Of course it is happening inside your head, Harry, but why on earth should that mean that it is not real?', '', 71, 43, 0),
(33, 7, 'The truth is, everyone is going to hurt you. You just got to find the ones worth suffering for. ', '', 33, 0, 0),
(34, 41, 'Not all of us can do great things. But we can do small things with great love. ', 'misattributed-to-mother-teresa', 55, 38, 0),
(35, 27, 'To the well-organized mind, death is but the next great adventure. ', '', 19, 46, 0),
(36, 10, 'All you need is love. But a little chocolate now and then doesn\'t hurt. ', '', 13, 32, 42),
(37, 50, 'We read to know we\'re not alone. ', 'misattributed-to-c-s-lewis', 70, 0, 0),
(38, 1, 'Any fool can know. The point is to understand. ', '', 49, 50, 86),
(39, 35, 'I have always imagined that Paradise will be a kind of library. ', '', 9, 51, 0),
(40, 21, 'It is never too late to be what you might have been. ', '', 46, 0, 0),
(41, 22, 'A reader lives a thousand lives before he dies, said Jojen. The man who never reads lives only one. ', '', 70, 9, 70),
(42, 8, 'You can never get a cup of tea large enough or a book long enough to suit me. ', '', 9, 70, 80),
(43, 38, 'You believe lies so you eventually learn to trust no one but yourself. ', '', 84, 8, 52),
(44, 38, 'If you can make a woman laugh, you can make her do anything. ', '', 35, 55, 0),
(45, 1, 'Life is like riding a bicycle. To keep your balance, you must keep moving. ', '', 53, 0, 0),
(46, 38, 'The real lover is the man who can thrill you by kissing your forehead or smiling into your eyes or just staring into space. ', '', 55, 0, 0),
(47, 38, 'A wise girl kisses but doesn\'t love, listens but doesn\'t believe, and leaves before she is left. ', 'attributed-no-source', 55, 89, 0),
(48, 40, 'Only in the darkness can you see the stars. ', '', 41, 46, 0),
(49, 27, 'It matters not what someone is born, but what they grow to be. ', '', 23, 0, 0),
(50, 30, 'Love does not begin and end the way we seem to think it does. Love is a battle, love is a war; love is a growing up. ', '', 55, 0, 0),
(51, 31, 'There is nothing I would not do for those who are really my friends. I have no notion of loving people by halves, it is not my nature. ', '', 33, 55, 0),
(52, 14, 'Do one thing every day that scares you. ', 'attributed', 31, 46, 0),
(53, 38, 'I am good, but not an angel. I do sin, but I am not the devil. I am just a small girl in a big world trying to find someone to love. ', 'attributed-no-source', 55, 37, 26),
(54, 1, 'If I were not a physicist, I would probably be a musician. I often think in music. I live my daydreams in music. I see my life in terms of music. ', '', 60, 0, 0),
(55, 24, 'If you only read the books that everyone else is reading, you can only think what everyone else is thinking. ', '', 9, 81, 0),
(56, 2, 'The difference between genius and stupidity is: genius has its limits. ', 'misattributed-to-einstein', 34, 78, 0),
(57, 44, 'He\'s like a drug for you, Bella. ', '', 22, 74, 76),
(58, 16, 'There is no friend as loyal as a book. ', '', 9, 33, 0),
(59, 25, 'When one door of happiness closes, another opens; but often we look so long at the closed door that we do not see the one which has been opened for us. ', '', 46, 0, 0),
(60, 19, 'Life isn\'t about finding yourself. Life is about creating yourself. ', '', 46, 53, 93),
(61, 9, 'That\'s the problem with drinking, I thought, as I poured myself a drink. If something bad happens you drink in an attempt to forget; if something good happens you drink in order to celebrate; and if nothing happens you drink to make something happen. ', '', 6, 0, 0),
(62, 46, 'You don\'t forget the face of the person who was your last hope. ', '', 66, 41, 0),
(63, 46, 'Remember, we\'re madly in love, so it\'s all right to kiss me anytime you feel like it. ', '', 42, 0, 0),
(64, 8, 'To love at all is to be vulnerable. Love anything and your heart will be wrung and possibly broken. If you want to make sure of keeping it intact you must give it to no one, not even an animal. Wrap it carefully round with hobbies and little luxuries; avoid all entanglements. Lock it up safe in the casket or coffin of your selfishness. But in that casket, safe, dark, motionless, airless, it will change. It will not be broken; it will become unbreakable, impenetrable, irredeemable. To love is to be vulnerable. ', '', 55, 0, 0),
(65, 29, 'Not all those who wander are lost. ', '', 82, 54, 88),
(66, 0, '', '', 0, 0, 0),
(67, 16, 'There is nothing to writing. All you do is sit down at a typewriter and bleed. ', '', 37, 92, 0),
(68, 43, 'Finish each day and be done with it. You have done what you could. Some blunders and absurdities no doubt crept in; forget them as soon as you can. Tomorrow is a new day. You shall begin it serenely and with too high a spirit to be encumbered with your old nonsense. ', '', 53, 72, 0),
(69, 39, 'I have never let my schooling interfere with my education. ', '', 24, 0, 0),
(70, 12, 'I have heard there are troubles of more than one kind. Some come from ahead and some come from behind. But I\'ve bought a big bat. I\'m all ready you see. Now my troubles are going to have troubles with me!', '', 83, 0, 0),
(71, 3, 'If I had a flower for every time I thought of you...I could walk through my garden forever. ', '', 33, 55, 0),
(72, 9, 'Some people never go crazy. What truly horrible lives they must lead. ', '', 42, 0, 0),
(73, 47, 'The trouble with having an open mind, of course, is that people will insist on coming along and trying to put things in it. ', '', 42, 63, 81),
(74, 12, 'Think left and think right and think low and think high. Oh, the thinks you can think up if only you try!', '', 42, 67, 0),
(75, 26, 'What really knocks me out is a book that, when you\'re all done reading it, you wish the author that wrote it was a terrific friend of yours and you could call him up on the phone whenever you felt like it. That doesn\'t happen much, though. ', '', 9, 70, 0),
(76, 20, 'The reason I talk to myself is because I\'m the only one whose answers I accept. ', '', 42, 0, 0),
(77, 34, 'You may say I\'m a dreamer, but I\'m not the only one. I hope someday you\'ll join us. And the world will live as one. ', '', 7, 21, 65),
(78, 49, 'I am free of all prejudice. I hate everyone equally. ', '', 42, 40, 0),
(79, 6, 'The question isn\'t who is going to let me; it\'s who is going to stop me. ', '', 46, 0, 0),
(80, 39, '²Classic² - a book which people praise and don\'t read. ', '', 9, 16, 70),
(81, 1, 'Anyone who has never made a mistake has never tried anything new. ', '', 59, 0, 0),
(82, 31, 'A lady\'s imagination is very rapid; it jumps from admiration to love, from love to matrimony in a moment. ', '', 42, 55, 90),
(83, 27, 'Remember, if the time should come when you have to make a choice between what is right and what is easy, remember what happened to a boy who was good, and kind, and brave, because he strayed across the path of Lord Voldemort. Remember Cedric Diggory. ', '', 47, 0, 0),
(84, 31, 'I declare after all there is no enjoyment like reading! How much sooner one tires of any thing than of a book! -- When I have a house of my own, I shall be miserable if I have not an excellent library. ', '', 9, 51, 70),
(85, 31, 'There are few people whom I really love, and still fewer of whom I think well. The more I see of the world, the more am I dissatisfied with it; and every day confirms my belief of the inconsistency of all human characters, and of the little dependence that can be placed on the appearance of merit or sense. ', '', 16, 9, 0),
(86, 8, 'Some day you will be old enough to start reading fairy tales again. ', '', 5, 70, 3),
(87, 8, 'We are not necessarily doubting that God will do the best for us; we are wondering how painful the best will turn out to be. ', '', 36, 0, 0),
(88, 39, 'The fear of death follows from the fear of life. A man who lives fully is prepared to die at any time. ', '', 19, 53, 0),
(89, 39, 'A lie can travel half way around the world while the truth is putting on its shoes. ', 'misattributed-mark-twain', 85, 0, 0),
(90, 8, 'I believe in Christianity as I believe that the sun has risen: not only because I see it, but because by it I see everything else. ', '', 15, 28, 73),
(91, 27, 'The truth.\" Dumbledore sighed. \"It is a beautiful and terrible thing, and should therefore be treated with great caution. ', '', 85, 0, 0),
(92, 33, 'I\'m the one that\'s got to die when it\'s time for me to die, so let me live my life the way I want to. ', '', 19, 53, 0),
(93, 28, 'To die will be an awfully big adventure. ', '', 4, 55, 0),
(94, 13, 'It takes courage to grow up and become who you really are. ', '', 18, 0, 0),
(95, 36, 'But better to get hurt by the truth than comforted with a lie. ', '', 53, 0, 0),
(96, 23, 'You never really understand a person until you consider things from his point of view... Until you climb inside of his skin and walk around in it. ', '', 53, 25, 0),
(97, 37, 'You have to write the book that wants to be written. And if the book will be too difficult for grown-ups, then you write it for children. ', '', 9, 12, 3),
(98, 39, 'Never tell the truth to people who are not worthy of it. ', '', 85, 0, 0),
(99, 12, 'A person\'s a person, no matter how small. ', '', 46, 0, 0),
(100, 22, '... a mind needs books as a sword needs a whetstone, if it is to keep its edge. ', '', 9, 57, 0),
(101, 51, 'If you will it, it is no dream.', '', 46, 20, 21),
(102, 51, 'Whoever would change men must change the conditions of their lives.', '', 53, 66, 10),
(103, 14, 'You must do the thing you think you cannot do.', '', 20, 46, 31),
(105, 14, 'The future belongs to those who believe in the beauty of their dreams.', '', 21, 98, 8),
(106, 36, 'it always hurts more to have and lose than to not have in the first place.', '', 54, 99, 0),
(131, 28, 'I\'m not young enough to know everything.', '', 102, 49, 0),
(132, 52, 'It is not the mountain we conquer but ourselves.', '', 46, 104, 105),
(143, 67, 'It always seems impossible until it\'s done.', '', 106, 46, 0),
(144, 67, 'Education is the most powerful weapon which you can use to change the world.', '', 24, 108, 91),
(145, 67, 'I learned that courage was not the absence of fear, but the triumph over it', '', 18, 31, 0),
(146, 68, 'Some are born great, some achieve greatness, and some have greatness thrust upon them.', 'Twelfth Night, Act 2, Scene 5', 38, 109, 110),
(147, 68, 'All that glisters is not gold', 'All that glisters is not gold', 111, 112, 0),
(148, 34, 'Life is what happens when you\'re busy making other plans.', '', 53, 68, 0),
(149, 14, 'When you reach the end of your rope, tie a knot in it and hang on.', '', 113, 46, 114),
(150, 70, 'Tell me and I forget. Teach me and I remember. Involve me and I learn.', '', 115, 50, 116),
(152, 71, 'Quality is not an act, it is a habit.', '', 119, 120, 0),
(153, 71, 'A friend to all is a friend to none.', '', 33, 0, 0),
(154, 71, 'Those that know, do. Those that understand, teach. ', '', 115, 50, 86),
(155, 72, 'Your silence gives consent. ', 'Note here', 121, 122, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
