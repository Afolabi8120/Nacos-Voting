<?php
	include('../core/init.php');
	$i = 1;
	$html = '<table border="1"><tr><td>S/N</td><td>Full Name</td><td>Post</td><td>Vote Percentage</td><td>No of Votes</td></tr>';
	foreach ($admin->fetchAllVotes() as $fetchCandidate) {
		$totalVote = $admin->getTotalVoteWhere($fetchCandidate->post);
		$candidateVote = $admin->getTotalCandidateVote($fetchCandidate->id);

		$vote = ($candidateVote / $totalVote) * 100;
		$html.='<tr><td>'.$i++.'</td><td>'.$fetchCandidate->fullname.'</td><td>'.$fetchCandidate->post.'</td><td>'.round($vote)                                                      
		.'%</td><td>'.$admin->getTotalCandidateVote($fetchCandidate->id).'</td></tr>';
	}
	$html.='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=vote-result.xls');
	echo $html;
?>