<?php
$event_name = [
  ['code' => 'ABA','name' => 'Abandoned','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '1','notes' => NULL]
  ['code' => 'ABO','name' => 'Abandon Original','category' => 'PAT','country' => 'EP','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'Abandon the originating patent that was re-designated in EP']
  ['code' => 'ADV','name' => 'Advisory Action','category' => 'PAT','country' => 'US','is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'ALL','name' => 'Allowance','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Use also for R71.3 in EP']
  ['code' => 'APL','name' => 'Appeal','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => 'Appeal or other remedy filed']
  ['code' => 'CAN','name' => 'Cancelled','category' => 'TM','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '1','notes' => NULL]
  ['code' => 'CLO','name' => 'Closed','category' => 'LTG','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '1','notes' => NULL]
  ['code' => 'COM','name' => 'Communication','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Communication regarding administrative or formal matters (missing parts, irregularities...)']
  ['code' => 'CRE','name' => 'Created','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'Creation date of matter - for attaching tasks necessary before anything else']
  ['code' => 'DAPL','name' => 'Decision on Appeal','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'State outcome in detail field']
  ['code' => 'DBY','name' => 'Draft By','category' => 'PAT','country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'DEX','name' => 'Deadline Extended','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Deadline extension requested']
  ['code' => 'DPAPL','name' => 'Decision on Pre-Appeal','category' => 'PAT','country' => 'US','is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'DRA','name' => 'Drafted','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'DW','name' => 'Deemed withrawn','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Decision needing a reply, such as further processing']
  ['code' => 'EHK','name' => 'Extend to Hong Kong','category' => 'PAT','country' => 'CN','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'ENT','name' => 'Entered','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'National entry date from PCT phase']
  ['code' => 'EOP','name' => 'End of Procedure','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '1','notes' => 'Indicates end of international phase for PCT']
  ['code' => 'EXA','name' => 'Examiner Action','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'AKA Office Action, i.e. anything related to substantive examination']
  ['code' => 'EXAF','name' => 'Examiner Action (Final)','category' => 'PAT','country' => 'US','is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'EXP','name' => 'Expiry','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '1','notes' => 'Do not use nor change - present for internal functionality']
  ['code' => 'FAP','name' => 'File Notice of Appeal','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'FBY','name' => 'File by','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'FDIV','name' => 'File Divisional','category' => 'PAT','country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'FIL','name' => 'Filed','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'FOP','name' => 'File Opposition','category' => 'OP','country' => 'EP','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'FPR','name' => 'Further Processing','category' => 'PAT','country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'FRCE','name' => 'File RCE','category' => 'PAT','country' => 'US','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'GRT','name' => 'Granted','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'INV','name' => 'Invalidated','category' => 'TM','country' => 'US','is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '1','notes' => NULL]
  ['code' => 'LAP','name' => 'Lapsed','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '1','notes' => NULL]
  ['code' => 'NPH','name' => 'National Phase','category' => 'PAT','country' => 'WO','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'OPP','name' => 'Opposition','category' => NULL,'country' => 'EP','is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'OPR','name' => 'Oral Proceedings','category' => 'PAT','country' => 'EP','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'ORE','name' => 'Opposition rejected','category' => 'PAT','country' => 'EP','is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'PAY','name' => 'Pay','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Use for any fees to be paid']
  ['code' => 'PDES','name' => 'Post designation','category' => 'TM','country' => 'WO','is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'PFIL','name' => 'Parent Filed','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'Filing date of the parent (use only when the matter type is defined). Use as link to the parent matter.']
  ['code' => 'PR','name' => 'Publication of Reg.','category' => 'TM','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'PREP','name' => 'Prepare','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => 'Any further action to be done by the responsible (comments, pre-handling, ...)']
  ['code' => 'PRI','name' => 'Priority Claim','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Use as link to the priority matter']
  ['code' => 'PRID','name' => 'Priority Deadline','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL]
  ['code' => 'PROD','name' => 'Produce','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'Any further documents to be filed (inventor designation, priority document, missing parts...)']
  ['code' => 'PSR','name' => 'Publication of SR','category' => 'PAT','country' => 'EP','is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'A3 publication']
  ['code' => 'PUB','name' => 'Published','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'For EP, this means publication WITH the search report (A1 publ.)']
  ['code' => 'RCE','name' => 'Request Continued Examination','category' => 'PAT','country' => 'US','is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'REC','name' => 'Received','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'Date the case was received from the client']
  ['code' => 'REF','name' => 'Refused','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'This is the final decision, that can only be appealed - do not mistake with an exam report']
  ['code' => 'REG','name' => 'Registration','category' => 'TM','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'REM','name' => 'Reminder','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'REN','name' => 'Renewal','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => 'AKA Annuity']
  ['code' => 'REP','name' => 'Respond','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => 'Use for any response']
  ['code' => 'REQ','name' => 'Request Examination','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'RSTR','name' => 'Restriction Req.','category' => 'PAT','country' => 'US','is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'SOL','name' => 'Sold','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '1','notes' => NULL]
  ['code' => 'SOP','name' => 'Summons to Oral Proc.','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'SR','name' => 'Search Report','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL,'updated_at' => NULL]
  ['code' => 'SUS','name' => 'Suspended','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'TRF','name' => 'Transferred','category' => NULL,'country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '1','notes' => 'Case no longer followed']
  ['code' => 'VAL','name' => 'Validate','category' => 'PAT','country' => 'EP','is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '1','killer' => '0','notes' => 'Validate granted EP in designated countries']
  ['code' => 'WAT','name' => 'Watch','category' => NULL,'country' => NULL,'is_task' => '1','status_event' => '0','default_responsible' => NULL,'use_matter_resp' => '1','unique' => '0','killer' => '0','notes' => NULL]
  ['code' => 'WIT','name' => 'Withdrawal','category' => 'PAT','country' => NULL,'is_task' => '0','status_event' => '1','default_responsible' => NULL,'use_matter_resp' => '0','unique' => '0','killer' => '1','notes' => NULL]
];
