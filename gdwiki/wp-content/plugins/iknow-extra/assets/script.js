'use strict';
document.addEventListener('DOMContentLoaded', () => {
// Voting Post
  const $voting = [...document.querySelectorAll('.vote')];

  if ($voting.length > 0) {
    $voting.forEach((vote) => {
      vote.addEventListener('click', (e) => {
        let selected = vote.getAttribute('data-vote');
        let post_id = vote.getAttribute('data-post');

        let request = new XMLHttpRequest();
        request.open('POST', iknow_ajax.url, true);
        request.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded; charset=UTF-8');
        request.responseType = 'json';
        request.send(
            'action=iknow_voting&nonce=' + iknow_ajax.nonce + '&post_id=' +
            post_id + '&vote=' + selected);

        request.onload = function() {
          if (request.status === 200) {
            let responseObj = request.response;
            if (responseObj.status === 'new') {
              let vote = responseObj.vote;
              let element = document.querySelector('#' + vote);
              let count = element.textContent;
              count = parseInt(count) + 1;
              element.textContent = count.toString();
              let yes = parseInt(
                  document.querySelector('#vote_yea').textContent);
              let no = parseInt(
                  document.querySelector('#vote_nay').textContent);
              let total = yes + no;
              let positive = Math.round(yes / total * 100);
              document.querySelector('#vote-progress').value = positive;
              document.querySelector('[data-vote="' + vote + '"]').
                  setAttribute('disabled', 'disabled');
              document.querySelector(
                  '#vote-response').innerHTML = responseObj.message;
            } else if (responseObj.status === 'change') {
              let count_up = parseInt(document.querySelector(
                  '#' + responseObj.change_up).textContent);
              count_up = parseInt(count_up) + 1;
              document.querySelector('#' +
                  responseObj.change_up).textContent = count_up.toString();
              document.querySelector(
                  '[data-vote="' + responseObj.change_up + '"]').
                  setAttribute('disabled', 'disabled');

              let count_down = parseInt(document.querySelector(
                  '#' + responseObj.change_down).textContent);
              count_down = parseInt(count_down) - 1;
              document.querySelector('#' +
                  responseObj.change_down).textContent = count_down.toString();
              document.querySelector(
                  '[data-vote="' + responseObj.change_down + '"]').
                  removeAttribute('disabled');

              document.querySelector(
                  '#vote-response').innerHTML = responseObj.message;

              let yes = parseInt(
                  document.querySelector('#vote_yea').textContent);
              let no = parseInt(
                  document.querySelector('#vote_nay').textContent);
              let total = yes + no;
              let positive = Math.round(yes / total * 100);
              document.querySelector('#vote-progress').value = positive;

            } else if (responseObj.status === 'false') {
              document.querySelector(
                  '#vote-response').innerHTML = responseObj.message;
            }

          }
        };
      });
    });
  }

  const $voteComment = [...document.querySelectorAll('.vote-comment')];

  if ($voteComment.length > 0) {
    $voteComment.forEach((vote) => {
      vote.addEventListener('click', (e) => {
        let selected = vote.getAttribute('data-vote-value');
        let comment_id = vote.getAttribute('data-vote-id');

        let request = new XMLHttpRequest();
        request.open('POST', iknow_ajax.url, true);
        request.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded; charset=UTF-8');
        request.responseType = 'json';
        request.send('action=iknow_comment_voting&nonce=' + iknow_ajax.nonce +
            '&comment_id=' + comment_id + '&vote=' + selected);

        request.onload = function() {
          if (request.status === 200) {
            let responseObj = request.response;
            let comment_id = responseObj.comment_id;
            if (responseObj.status === 'new') {
              let vote = responseObj.vote;
              let element = document.querySelector(
                  '#comment_' + vote + '_' + comment_id);
              let el_count = document.querySelector(
                  '#comment_' + vote + '_' + comment_id +
                  ' .comment-vote-count');
              let count = el_count.textContent;
              count = parseInt(count) + 1;
              el_count.textContent = count.toString();
              element.setAttribute('disabled', 'disabled');

            } else if (responseObj.status === 'change') {
              let element_up = document.querySelector(
                  '#comment_' + responseObj.change_up + '_' + comment_id);
              let el_up_count = document.querySelector(
                  '#comment_' + responseObj.change_up + '_' + comment_id +
                  ' .comment-vote-count');
              let count_up = parseInt(el_up_count.textContent);
              count_up = parseInt(count_up) + 1;
              el_up_count.textContent = count_up.toString();
              element_up.setAttribute('disabled', 'disabled');

              let element_down = document.querySelector(
                  '#comment_' + responseObj.change_down + '_' + comment_id);
              let el_down_count = document.querySelector(
                  '#comment_' + responseObj.change_down + '_' + comment_id +
                  ' .comment-vote-count');
              let count_down = parseInt(el_down_count.textContent);
              count_down = parseInt(count_down) - 1;
              el_down_count.textContent = count_down.toString();
              element_down.removeAttribute('disabled');
            }

          }
        };

      });
    });
  }

});