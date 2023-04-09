#define	uint			unsigned int
#define ulong			unsigned long

#define Disable()		gemdos(601)
#define Enable()		gemdos(602)
#define GetTask()		gemdos(603)
#define OpenPort(a,b)		gemdos(604,a,b)
#define AskMsg()		gemdos(606)
#define AskPort(a)		gemdos(607,a)
#define SendMsg(a,b)		gemdos(608,a,b)
#define ReplyMsg(a)		gemdos(609,a)
#define ClosePort(a)		gemdos(610,a)
#define GetMsg()		gemdos(605)
#define PGetMsg(a)		gemdos(613, a)
#define GetIPAddr(a,b)		gemdos(612,a,b)
#define udp_open(a)		gemdos(620,a)
#define udp_close(a)		gemdos(621,a)
#define udp_read(a,b,c)		gemdos(622,a,b,c)
#define udp_write(a,b,c,d)	gemdos(623,a,b,c,d)
#define tcp_open(a,b,c,d,e)	gemdos(630,a,b,c,d,e)
#define tcp_write(a,b,c,d,e)	gemdos(631,a,b,c,(char)d,(char)e)
#define tcp_read(a,b,c)		gemdos(632,a,b,c)
#define	tcp_close(a)		gemdos(633,a)
#define tcp_abort(a)		gemdos(634,a)
#define tcp_stat(a,b)		gemdos(635,a,b)
#define mytime()		gemdos(614)
#define Frlock(a,b,c)		gemdos(0x62,a,b,c)
#define Flock(a,b)		gemdos(0x64,a,b)
#define Frunlock(a,b)		gemdos(0x63,a,b)
#define Funlock(a)		gemdos(0x65,a)
#define getprt(a)		gemdos(0x1f7,a)
#define dflush(a)		gemdos(0x1f8,a)
#define chpw(a)			gemdos(0x1f9,a)
#define IamBack()		gemdos(615)

/* Fehlernummern fÅr AP_ERR */
#define PERMFAULT   -1      /* no permission for login  */
#define SEQNFAULT   -2      /* falsche Sequenznummer    */
#define TYPEFAULT   -3      /* falsche Paket-Art    */
#define SERVFAULT   -4      /* falscher Service */
#define TIMEFAULT   -5      /* Ports Åberlastet */
#define NOSPFAULT	-6		/* Kein Platz im Speicher */
#define NEEDPASWD	-7		/* Client soll Passwort abfragen */
#define NETERROR	-1	/* Netzwerk-Fehler */
#define NETERR		-1	/* Netzwerk-Fehler */

/* DESTI Struktur fÅr ParameterÅbergabe */
typedef struct sdest
{
	unsigned int		Port;
	unsigned char		IPAddr[4];
} DESTI;

/* mîgliche Message-Arten */
#define		MESSG	1		/* normale Message  */
#define		REPLY	2		/* Message-Reply */

/* LÑnge des Portnamen */
#define		PNAMLEN		10

typedef struct sMsg
{
	struct sMsg		*inext;		/* Zeiger auf nÑchste Message */
	unsigned int		Port;		/* Portnummer */
	unsigned long		Sender;		/* Task-ID des Senders */
	unsigned int		Type;		/* Art der Message */
	char			*Msg;		/* Zeiger auf Message */
} MSG;

/* TCP-Verbindungsstatus */
#define		CLOSED			0
#define		LISTEN			1
#define		SYN_SENT		2
#define		SYN_RECEIVED		3
#define		ESTABLISHED		4
#define		FIN_WAIT_1		5
#define		FIN_WAIT_2		6
#define		CLOSE_WAIT		7
#define		CLOSING			8
#define		LAST_ACK		9
#define		TIME_WAIT		10

/* TCP-Open-Mode */
#define		AKTIV		1
#define		PASSIV		2
#define		PUSH		1
#define		NO_PUSH		0
#define		URGENT		1
#define		NO_URGENT	0

/* TCP-Statusblock fuer tcp_stat() */
typedef struct stcpst
{
	uint		TCP_ID;
	uint		TCP_Port;
	DESTI		TCP_Dest;
	uint		TCP_State;
	long		TCP_Urgent;
	int		TCP_Timeout;
	ulong		TCP_RWin;
	ulong		TCP_RWfree;
} TCPSTAT;
