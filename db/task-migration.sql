CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_question_id` int(11) NOT NULL,
  `task_answers_ids` varchar(256) NOT NULL,
  `task_answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `task` (`id`, `task_question_id`, `task_answers_ids`, `task_answer_id`) VALUES
(1, 1, '1,2,3,4', 2);

CREATE TABLE `task_answer` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `task_answer` (`id`, `image`) VALUES
(1, 'answer-1.png'),
(2, 'answer-2.png'),
(3, 'answer-3.png'),
(4, 'answer-4.png');

CREATE TABLE `task_answer_description` (
  `id` int(11) NOT NULL,
  `task_answer_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `task_answer_description` (`id`, `task_answer_id`, `lang_id`, `text`) VALUES
(1, 1, 1, 'Варіант 1'),
(2, 1, 2, 'Variant 1'),
(3, 2, 1, 'Варіант 2'),
(4, 3, 1, 'Варіант 3'),
(5, 4, 1, 'Варіант 4'),
(6, 2, 2, 'Variant 2'),
(7, 3, 2, 'Variant 3'),
(8, 4, 2, 'Variant 4');


CREATE TABLE `task_question` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `task_question` (`id`, `image`) VALUES
(1, 'question-1.png');

CREATE TABLE `task_question_description` (
  `id` int(11) NOT NULL,
  `task_question_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `task_question_description` (`id`, `task_question_id`, `lang_id`, `text`) VALUES
(1, 1, 1, 'Що покаже браузер, якщо в ньому відкрити index.html з таким кодом?'),
(2, 1, 2, 'What we will see when open index.html with this code in browser?');

ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_answer`
--
ALTER TABLE `task_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_answer_description`
--
ALTER TABLE `task_answer_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_question`
--
ALTER TABLE `task_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_question_description`
--
ALTER TABLE `task_question_description`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_answer`
--
ALTER TABLE `task_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_answer_description`
--
ALTER TABLE `task_answer_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_question`
--
ALTER TABLE `task_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_question_description`
--
ALTER TABLE `task_question_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
